<?php
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'error' => 'Method not allowed']);
    exit;
}

require_once __DIR__ . '/../config/db.php';

$raw = file_get_contents('php://input');
$data = json_decode($raw, true);

if (!is_array($data) || empty($data['codes']) || !is_array($data['codes'])) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'error' => 'Invalid payload']);
    exit;
}

$format = isset($data['format']) ? preg_replace('/[^A-Za-z0-9]/', '', (string) $data['format']) : 'CODE128';
$codes = [];

foreach ($data['codes'] as $code) {
    $code = trim((string) $code);
    if ($code !== '') {
        $codes[] = mb_substr($code, 0, 128);
    }
}

if (count($codes) === 0) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'error' => 'No codes provided']);
    exit;
}

if (count($codes) > 200) {
    $codes = array_slice($codes, 0, 200);
}

$pdo = db();
if (!$pdo) {
    echo json_encode(['ok' => true, 'saved' => false, 'message' => 'Database not configured']);
    exit;
}

try {
    $stmt = $pdo->prepare(
        'INSERT INTO barcode_batches (format, code_count, codes_json) VALUES (?, ?, ?)'
    );
    $stmt->execute([
        $format,
        count($codes),
        json_encode($codes, JSON_UNESCAPED_UNICODE),
    ]);

    echo json_encode([
        'ok' => true,
        'saved' => true,
        'id' => (int) $pdo->lastInsertId(),
        'count' => count($codes),
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['ok' => false, 'error' => 'Failed to save batch']);
}
