# 🏷️ Barcode Generator

A clean, batch-ready **Barcode Generator** built with **PHP · HTML · CSS · JavaScript · MySQL**.  
Paste multiple codes, preview barcodes instantly, then download them as **PNG** or a single **ZIP** — with full **English / 中文** support.

---

## ✨ Features

### 🔢 Batch Code Input
Enter one code per line (for example 10 numbers at once) and generate matching barcodes in a single click.

### 👁️ Live Preview
See every barcode rendered on screen with success / fail status before you download anything.

### 📥 Single & ZIP Download
Download any barcode as a **PNG**, or pack all successful barcodes into one **ZIP** archive.

### 🖨️ Print Ready
Use the browser print dialog to print only the barcode preview (input panel is hidden).

### 🌐 Bilingual UI
Switch between **EN** and **中文** anytime. Language is remembered via cookie, and the User Manual follows the same language.

### 📘 Built-in User Manual
A full-width desktop manual explains features, formats, downloads, and FAQ — no external docs required.

### 🗄️ Optional MySQL History
If you import the SQL schema, generation batches can be saved. Without a database, the app still works normally.

---

## 🏗️ Tech Stack

| Category | Technology |
|---|---|
| 🖥️ Frontend | HTML5, CSS3, JavaScript |
| 🔙 Backend | PHP |
| 🗄️ Database | MySQL (optional) |
| 📦 Barcode Engine | JsBarcode |
| 🗜️ ZIP Export | JSZip + FileSaver |
| 🏠 Local Server | XAMPP (Apache + MySQL) |
| ☁️ Hosting | Shared hosting friendly (e.g. iFastNet) |

---

## 📁 Project Structure

```
Barcode_Generator/
├── index.php                 # Main generator page
├── manual.php                # User Manual (follows language)
├── api/
│   └── save_batch.php        # Optional batch history API
├── assets/
│   ├── css/style.css
│   ├── js/app.js
│   └── screenshots/          # README screenshots go here
├── config/
│   └── db.php                # MySQL connection (optional)
├── includes/
│   ├── lang.php              # EN / 中文 translations
│   ├── header.php
│   └── footer.php
├── sql/
│   └── schema.sql            # Optional database schema
└── README.md
```

---

## ⬇️ Download & Run on Localhost

1. Download this project from GitHub:  
   **[Code → Download ZIP](https://github.com/dljk0927prog/Barcode_Generator)**  
   or clone:
   ```bash
   git clone https://github.com/dljk0927prog/Barcode_Generator.git
   ```
2. Extract the ZIP (if downloaded), then rename the folder to `Barcode_Generator`.
3. Put the folder into XAMPP:
   ```
   C:\xampp\htdocs\Barcode_Generator\
   ```
4. Open **XAMPP Control Panel** and start **Apache**.
5. Open your browser and go to:
   ```
   http://localhost/Barcode_Generator/
   ```

That’s it — you can start generating barcodes right away.  
*(MySQL is optional. Without it, generate / download / print still work.)*

---

## 🚀 How to Use the System

### 1) Generate barcodes
1. Open the **Generator** page.
2. In **Code list**, type or paste codes — **one code per line**.
3. Choose a barcode format (default: **CODE128** — recommended).
4. Choose whether to show the code text under each barcode.
5. Click **Generate**.
6. Check the preview cards on the right.

> Tip: Click **Fill sample (10)** first to try the full flow with demo codes.

### 2) Download
- Click **Download PNG** on one card to save a single image.
- Click **Download all ZIP** to pack every successful barcode into one ZIP file.

### 3) Print
- Click **Print** to print the preview barcodes from your browser.

### 4) Switch language
- Use **EN / 中文** in the top-right corner.
- The Generator and User Manual stay in sync.

### 5) Read the User Manual
- Click **User Manual** in the header.
- Desktop layout uses full content width (`width: 100%`).
- Manual content switches with your selected language.

---

## 🧾 Supported Barcode Formats

| Format | Best for | Notes |
|---|---|---|
| CODE128 | Digits, letters, symbols | Most flexible — recommended |
| CODE39 | Uppercase + digits | Smaller character set |
| EAN-13 | Retail products | Needs 12/13 digits |
| EAN-8 | Short product codes | Needs 7/8 digits |
| UPC-A | North American retail | Needs 11/12 digits |
| ITF-14 / MSI / Pharmacode | Logistics / industry | Must match format rules |

---

## 🖼️ Project Screenshots

| Generator (EN) | Generator (中文) |
|---|---|
| ![Generator EN](assets/screenshots/generator-en.png) | ![Generator ZH](assets/screenshots/generator-zh.png) |

| Barcodes Preview | Language Switch |
|---|---|
| ![Preview](assets/screenshots/barcodes-preview.png) | ![Language](assets/screenshots/language-switch.png) |

---

## 🎬 Demo Video

Watch the project walkthrough on Google Drive:

👉 **[Watch Demo Video](https://drive.google.com/file/d/1SZkenFdy3P3Ak_RZ2p44u21P2Qcvg7Iv/view?usp=drive_link)**

---

## 📺 Demo / Links

| Resource | Link |
|---|---|
| 🌐 Live URL | [desmondliewjiankai.kolejsynergy.com/Barcode_Generator](https://desmondliewjiankai.kolejsynergy.com/Barcode_Generator/) |
| 🎬 Demo Video | [Watch on Google Drive](https://drive.google.com/file/d/1SZkenFdy3P3Ak_RZ2p44u21P2Qcvg7Iv/view?usp=drive_link) |
| 📘 User Manual | [Open Manual](https://desmondliewjiankai.kolejsynergy.com/Barcode_Generator/manual.php) |
| 💻 Local (XAMPP) | `http://localhost/Barcode_Generator/` |
| 📦 GitHub Repository | [dljk0927prog/Barcode_Generator](https://github.com/dljk0927prog/Barcode_Generator) |

---

## ✅ Quick Test Plan

- [ ] Open homepage in English by default
- [ ] Fill 10 sample codes and generate successfully
- [ ] Download one PNG
- [ ] Download all as ZIP and unzip to verify images
- [ ] Switch to 中文 and confirm UI + manual language change
- [ ] Print preview (optional)

---

## 📄 License / Copyright

Copyright © 2026 Desmond Liew. All Rights Reserved.

---

⭐ If this project helps you, please star the repository!  
✨ Feel free to explore, fork, and improve it.
