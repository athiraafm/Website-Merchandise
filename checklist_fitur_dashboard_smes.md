# Laporan Checklist Fitur dan Perbandingan Dashboard SMES Borneo

**Proyek:** Redesign Dashboard SMES Telkom Regional 4 Kalimantan  
**Tanggal Laporan:** 15 April 2026  
**Disusun oleh:** Ariel Itsbat (Mahasiswa Magang)  
**Versi Dashboard:** hsi-dashboard (frontend, deployed di Vercel)

---

## Daftar Isi

1. [Ringkasan Eksekutif](#1-ringkasan-eksekutif)
2. [Perbandingan Struktur Menu](#2-perbandingan-struktur-menu)
3. [Checklist Fitur per Menu](#3-checklist-fitur-per-menu)
4. [Perubahan Visualisasi Data](#4-perubahan-visualisasi-data)
5. [Identifikasi Bug dan Potensi Masalah](#5-identifikasi-bug-dan-potensi-masalah)
6. [Fitur yang Belum Tersedia](#6-fitur-yang-belum-tersedia)
7. [Estimasi Progress dan Waktu Penyelesaian](#7-estimasi-progress-dan-waktu-penyelesaian)

---

## 1. Ringkasan Eksekutif

Dashboard SMES Borneo telah menjalani proses redesign dari **12 menu utama dengan 235 total submenu** menjadi **5 menu utama (ditambah 1 menu DMO yang baru)** dengan struktur yang lebih terorganisir. Build production berhasil tanpa error (exit code 0), dan aplikasi telah di-deploy ke Vercel.

| Aspek | Dashboard Lama | Dashboard Baru |
|-------|---------------|----------------|
| Menu utama di sidebar | 12 | 5 + 1 (DMO) |
| Total submenu (estimasi) | 235 | ~180 |
| Halaman yang diimplementasikan (file .jsx) | - | 158 file komponen |
| Main Dashboard per menu | Tidak ada | 6 buah (Home, Revenue, B2B, HSI/WMS combined, Prodigi, Customer Care) |
| Halaman dengan konten lengkap | - | 147 |
| Halaman masih kosong (EmptyPage) | - | 8 |

---

## 2. Perbandingan Struktur Menu

### 2.1 Pemetaan Nama Menu Lama ke Menu Baru

| No | Menu Lama | Menu Baru | Status Perubahan |
|----|-----------|-----------|-----------------|
| 1 | Revenue | **REVENUE** | Tetap, ditambah Main Dashboard dan submenu AM |
| 2 | AM/AMEX | **B2B** | Diganti nama, ditambah Main Dashboard, Micro Management, Top 100, Komitmen Boost |
| 3 | HSI | **Fix Broadband > HSI** | Digabung di bawah menu Fix Broadband bersama WMS |
| 4 | WiFi | **Fix Broadband > WMS** | Diganti nama, digabung di bawah Fix Broadband |
| 5 | Bandwidth | **B2B > Bandwidth** | Dipindahkan menjadi submenu B2B |
| 6 | Digital | **PRODIGI** (di sidebar) / **Digital** (di route legacy) | Diganti nama, ditambah Main Dashboard |
| 7 | QOS | **Customer Care > QOS** (legacy routes) | Dipindahkan ke Customer Care |
| 8 | Rising Star | Tidak tersedia | Dihilangkan dari sidebar (tidak ada komponen) |
| 9 | Gamification | **Fix Broadband > HSI > Gamification** | Dipindahkan ke dalam HSI |
| 10 | Partnership | **Fix Broadband > HSI > Channel/Partnership** | Dipindahkan ke dalam HSI |
| 11 | Caring Regional | **Customer Care > Caring Collection** | Diganti nama dan direstrukturisasi |
| 12 | Tools | Tidak tersedia di sidebar | Dihilangkan (khusus Super Admin, tidak termasuk scope redesign) |

### 2.2 Menu Baru yang Tidak Ada di Dashboard Lama

| No | Menu Baru | Keterangan |
|----|-----------|------------|
| 1 | Home Dashboard | Halaman utama dengan KPI Cards dan grafik overview setelah login |
| 2 | Main Dashboard (per menu) | Setiap menu utama memiliki grafik ringkasan di halaman pertama |
| 3 | Fix Broadband | Menu gabungan HSI + WMS dengan Main Dashboard terkonsolidasi |
| 4 | Customer Care > Leveraging | Submenu baru: Prodigi, Upgrade, Revenue |
| 5 | Customer Care > CX | Submenu baru: NPS, Detractor, HVC, Top 100 B2B |
| 6 | B2B > Micro Management | Halaman baru untuk monitoring mikro B2B |
| 7 | B2B > Top 100 | Halaman baru untuk 100 pelanggan B2B teratas |
| 8 | DMO | Menu baru sepenuhnya: Dashboard, REMAC, REACH, RECAP, REACT, Leads Digital Order |

### 2.3 Perbandingan Struktur Submenu

#### REVENUE

| Submenu | Dashboard Lama | Dashboard Baru | Status |
|---------|---------------|----------------|--------|
| Main Dashboard | Tidak ada | `/revenue/main-dashboard` | Baru |
| Regional > Realisasi | Ada | `/revenue/regional/realisasi` | Selesai |
| Regional > Trend | Ada | `/revenue/regional/trend` | Selesai |
| Witel > Realisasi | Ada | `/revenue/witel/realisasi` | Selesai |
| Witel > Trend | Ada | `/revenue/witel/trend` | Selesai |
| Witel > Monthly | Ada | `/revenue/witel/monthly` | Selesai |
| Telda > Realisasi | Ada | `/revenue/telda/realisasi` | Selesai |
| Prognosa | Ada | `/revenue/prognosa` | Selesai |
| NGTMA | Ada | `/revenue/ngtma` | Selesai |
| AM | Tidak ada | `/revenue/am` | Baru, selesai |

**Status Revenue: 10/10 submenu selesai (100%)**

---

#### B2B (sebelumnya AM/AMEX)

| Submenu | Dashboard Lama | Dashboard Baru | Status |
|---------|---------------|----------------|--------|
| Main Dashboard | Tidak ada | `/b2b/main-dashboard` | Baru, selesai |
| Billcomp | Ada | `/b2b/billcomp` | Selesai |
| Activity Feed | Ada | `/b2b/activity-feed` | Selesai |
| Micro Management | Tidak ada | `/b2b/micro-management` | Baru, selesai |
| Top 100 | Tidak ada | `/b2b/top100` | Baru, selesai |
| Update Boost > Planning | Ada | `/b2b/update-boost/planning` | Selesai |
| Update Boost > Progress | Ada | `/b2b/update-boost/progress` | Selesai |
| Update Boost > Weekly | Ada | `/b2b/update-boost/weekly` | Selesai |
| Update Boost > Komitmen | Tidak ada | `/b2b/update-boost/komitmen` | Baru, selesai |
| Potensi > Sodomoro | Ada | `/b2b/potensi/sodomoro` | Selesai |
| Potensi > Billcomp | Ada | `/b2b/potensi/billcomp` | Selesai |
| Potensi > Weekly BC | Ada | `/b2b/potensi/weekly-bc` | Selesai |
| Order LOP > On Progress | Ada | `/b2b/order-lop/on-progress` | Selesai |
| Order LOP > Boost BC | Ada | `/b2b/order-lop/boost-bc` | Selesai |
| Order LOP > Pending Baso | Ada | `/b2b/order-lop/pending-baso` | Selesai |
| Order LOP > Pending Billaprov | Ada | `/b2b/order-lop/pending-billaprov` | Selesai |
| Order LOP > Sodomoro | Ada | `/b2b/order-lop/sodomoro` | Selesai |
| Order LOP > Follow Up Divisi | Ada | `/b2b/order-lop/follow-up` | Selesai |
| Order LOP > Diagram Endcontr | Ada | `/b2b/order-lop/diagram-endcontr` | Selesai |
| Order LOP > Report Termin | Ada | `/b2b/order-lop/report-termin` | Selesai |
| Report Inputter > Progress LOP | Ada | `/b2b/report-inputter/progress-lop` | Selesai |
| Report Inputter > Progress EDK | Ada | `/b2b/report-inputter/progress-edk` | Selesai |
| Performance > Aktivitas AM | Ada | `/b2b/performance/aktivitas-am` | Selesai |
| Performance > Funnel LOP | Ada | `/b2b/performance/funnel-lop` | Selesai |
| Performance > Kuadran AM | Ada | `/b2b/performance/kuadran-am` | Selesai |
| Performance > Scatter AM | Ada | `/b2b/performance/scatter-am` | Selesai |
| Search Data | Ada | `/b2b/search-data` | Selesai |
| Performance KM | Ada | `/b2b/performance-km` | Selesai |
| Bandwidth > Regional | Dari menu "Bandwidth" | `/b2b/bandwidth/regional` | Dipindahkan, selesai |
| Bandwidth > Witel | Dari menu "Bandwidth" | `/b2b/bandwidth/witel` | Dipindahkan, selesai |
| Bandwidth > Branch | Dari menu "Bandwidth" | `/b2b/bandwidth/branch` | Dipindahkan, selesai |
| Bandwidth > Ekosistem | Dari menu "Bandwidth" | `/b2b/bandwidth/ekosistem` | Dipindahkan, selesai |
| Bandwidth > Produk | Dari menu "Bandwidth" | `/b2b/bandwidth/produk` | Dipindahkan, selesai |

**Status B2B: 33/33 submenu selesai (100%)**

---

#### HSI (di dalam Fix Broadband)

| Submenu | Dashboard Lama | Dashboard Baru | Status |
|---------|---------------|----------------|--------|
| Main Dashboard | Tidak ada | `/hsi/main-dashboard` | Baru, selesai |
| Regional | Ada | `/hsi/regional` | Selesai |
| Witel | Ada | `/hsi/witel` | Selesai |
| All Witel | Ada | `/hsi/all-witel` | Selesai (route ada, tidak di sidebar) |
| Branch | Ada | `/hsi/branch` | Selesai |
| Ekosistem | Ada | `/hsi/ekosistem` (route tidak di sidebar, halaman ada) | Selesai (halaman ada) |
| Channel > All Channel | Ada (All Channel) | `/hsi/channel/all` | Selesai |
| Channel > Partnership | Ada (All Channel > Partnership) | `/hsi/all-channel/partnership` | Selesai |
| Channel > Acc Representative | Ada | `/hsi/all-channel/acc-representative` | Selesai |
| Channel > Dealership | Ada | `/hsi/all-channel/dealership` | Selesai |
| Channel > Mitra | Dari menu Partnership | `/hsi/channel/mitra` | Dipindahkan, selesai |
| Channel > Witel | Dari menu Partnership | `/hsi/channel/witel` | Dipindahkan, selesai |
| Channel > WTD Member | Dari menu Partnership | `/hsi/channel/wtd-member` | Dipindahkan, selesai |
| Channel > Daily Member | Dari menu Partnership | `/hsi/channel/daily-member` | Dipindahkan, selesai |
| Periode Report | Ada | `/hsi/periode-report` | Selesai |
| Periode Report > Daily | Ada | `/hsi/periode-report/daily` | Selesai |
| Periode Report > Monthly | Ada | `/hsi/periode-report/monthly` | Selesai |
| Periode Report > Sales Trend | Dari Trend Indibiz | `/hsi/periode-report/sales-trend` | Dipindahkan, selesai |
| Periode Report > ARPU Trend | Dari Trend Indibiz | `/hsi/periode-report/arpu-trend` | Dipindahkan, selesai |
| Periode Report > List Paket | Dari menu terpisah | `/hsi/periode-report/list-paket` | Dipindahkan, selesai |
| Trend Indibiz > Churn HSI Trend | Ada | `/hsi/trend-indibiz/churn` (legacy route) | Selesai (dipindah ke CC) |
| Trend Indibiz > CT0 Trend | Ada | `/hsi/trend-indibiz/ct0` (legacy route) | Selesai (dipindah ke CC) |
| Work Order > Report WO | Dari Monitoring Selfi | `/hsi/work-order/report-wo` | Selesai |
| Work Order > Inbox | Dari Monitoring Selfi | `/hsi/work-order/inbox` | Selesai |
| Work Order > Add Cleansing | Dari Tools | `/hsi/work-order/add-cleansing` | Dipindahkan, selesai |
| Work Order > UPD House Keeping | Dari Monitoring Selfi | `/hsi/work-order/upd-housekeeping` | Selesai |
| Inbox Amodaqe | Ada | `/hsi/monitoring-selfi/inbox-amodaqe` (legacy) | Selesai (legacy route) |
| Inbox BSWitel | Ada | `/hsi/monitoring-selfi/inbox-bswitel` (legacy) | Selesai (legacy route) |
| Inbox RSO | Ada | `/hsi/monitoring-selfi/inbox-rso` (legacy) | Selesai (legacy route) |
| Top Telda | Ada | `/hsi/top-telda` | Selesai |
| HSI HVC | Ada | `/hsi/hvc` | Selesai |
| My Activity > Feed | Dari menu Partnership | `/hsi/partnership/my-activity/feed` | Dipindahkan, selesai |
| My Activity > Monthly | Dari menu Partnership | `/hsi/partnership/my-activity/monthly` | Dipindahkan, selesai |
| My Activity > Witel | Dari menu Partnership | `/hsi/partnership/my-activity/witel` | Dipindahkan, selesai |
| My Activity > Daily | Dari menu Partnership | `/hsi/partnership/my-activity/daily` | Dipindahkan, selesai |
| My Activity > Validasi | Dari menu Partnership | `/hsi/partnership/my-activity/validasi` | Dipindahkan, selesai |
| KDMP > Feed | Dari menu Partnership | `/hsi/partnership/kdmp/feed` | Dipindahkan, selesai |
| KDMP > Witel | Dari menu Partnership | `/hsi/partnership/kdmp/witel` | Dipindahkan, selesai |
| KDMP > Telda | Dari menu Partnership | `/hsi/partnership/kdmp/telda` | Dipindahkan, selesai |
| Gamification > Boost ISE | Dari menu Gamification | `/hsi/gamification/boost-ise` | Dipindahkan, selesai |
| Gamification > Bigdeal Bigchance | Tidak ada | `/hsi/gamification/bigdeal` | Baru, selesai |
| Gamification > Top 10 AR | Dari menu Gamification | `/hsi/gamification/top10-ar` | **EmptyPage** |
| Gamification > Top 10 SA | Dari menu Gamification | `/hsi/gamification/top10-sa` | **EmptyPage** |
| Gamification > Best Telda | Dari menu Gamification | `/hsi/gamification/best-telda` | **EmptyPage** |

**Status HSI: 41/44 submenu selesai, 3 masih EmptyPage (93%)**

---

#### WMS (di dalam Fix Broadband)

| Submenu | Dashboard Lama (WiFi) | Dashboard Baru | Status |
|---------|----------------------|----------------|--------|
| Main Dashboard | Tidak ada | `/wms/main-dashboard` | Baru, selesai |
| Regional | Ada | `/wms/regional` | Selesai |
| Witel | Ada | `/wms/witel` | Selesai |
| Branch | Ada | `/wms/branch` | Selesai |
| Ekosistem | Ada | `/wms/ekosistem` | Selesai |
| All Channel | Ada | `/wms/all-channel` | Selesai |
| Trend WiFi > ARPU Trend | Ada | `/wms/trend-wifi/arpu` | Selesai |
| Trend WiFi > Churn Trend | Ada | `/wms/trend-wifi/churn` | Selesai |
| Trend WiFi > CTO Trend | Ada | `/wms/trend-wifi/cto` | Selesai |
| Monitoring (Kendala PI) | Ada (Kendala PI) | `/wms/monitoring` | Selesai (diganti nama) |

**Status WMS: 10/10 submenu selesai (100%)**

---

#### PRODIGI (sebelumnya Digital)

| Submenu | Dashboard Lama (Digital) | Dashboard Baru | Status |
|---------|-------------------------|----------------|--------|
| Main Dashboard | Tidak ada | `/prodigi/main-dashboard` | Baru, selesai |
| Witel | Ada | `/prodigi/witel` | **EmptyPage** (konten ada di `/digital/prodigi/witel`) |
| Ekosistem | Ada | `/prodigi/ekosistem` | **EmptyPage** (konten ada di `/digital/prodigi/ekosistem`) |
| 100 Days | Ada | `/prodigi/100-days` | **EmptyPage** (konten ada di `/digital/prodigi/100-days`) |

> **Catatan penting:** Halaman Prodigi Witel, Ekosistem, dan 100 Days sebenarnya sudah memiliki komponen yang diimplementasikan (`DigitalProdigiWitel.jsx`, `DigitalProdigiEkosistem.jsx`, `DigitalProdigi100.jsx`), namun route `/prodigi/*` mengarah ke EmptyPage sementara route `/digital/prodigi/*` mengarah ke komponen yang benar. Ini merupakan **inkonsistensi routing** yang perlu diperbaiki.

**Status Prodigi: 1/4 submenu selesai, 3 EmptyPage karena routing error (25% di route Prodigi, 100% jika dihitung route Digital)**

---

#### CUSTOMER CARE (sebelumnya Caring Regional + QOS)

| Submenu | Dashboard Lama | Dashboard Baru | Status |
|---------|---------------|----------------|--------|
| Main Dashboard | Tidak ada | `/customer-care/main-dashboard` | Baru, selesai |
| Caring Collection > Biaya PSB | Dari QOS | `/customer-care/caring-collection/biaya-psb` | Selesai |
| Caring Collection > Report Bilperdu | Dari QOS | `/customer-care/caring-collection/report-bilperdu` | Selesai |
| Caring Collection > C3MR | Dari Caring Regional | `/customer-care/caring-collection/c3mr` | Selesai |
| Caring Collection > Caring Pra NPC > Caring | Baru | `/customer-care/.../caring-pra-npc/caring` | Selesai |
| Caring Collection > Caring Pra NPC > Report | Baru | `/customer-care/.../caring-pra-npc/report` | Selesai |
| Caring Collection > Caring CT0 > Caring | Dari Caring Regional | `/customer-care/.../caring-ct0/caring` | Selesai |
| Caring Collection > Caring CT0 > Report | Dari Caring Regional | `/customer-care/.../caring-ct0/report` | Selesai |
| Caring Collection > Caring CT0 > Churn HSI Trend | Dari HSI Trend | `/customer-care/.../churn-hsi-trend` | Selesai |
| Caring Collection > Caring CT0 > CT0 Trend | Dari HSI Trend | `/customer-care/.../ct0-trend` | Selesai |
| Caring Collection > Churn to Sales | Dari QOS | `/customer-care/.../churn-to-sales` | Selesai |
| Leveraging > Prodigi | Baru | `/customer-care/leveraging/prodigi` | Selesai |
| Leveraging > Upgrade | Baru | `/customer-care/leveraging/upgrade` | Selesai |
| Leveraging > Revenue | Baru | `/customer-care/leveraging/revenue` | Selesai |
| CX > NPS | Baru | `/customer-care/cx/nps` | Selesai |
| CX > Detractor | Baru | `/customer-care/cx/detractor` | Selesai |
| CX > HVC | Link ke HSI HVC | `/hsi/hvc` | Selesai (cross-link) |
| CX > Top 100 B2B | Link ke B2B Top100 | `/b2b/top100` | Selesai (cross-link) |
| Legacy: Hasil CT0 | Dari Caring Regional | `/customer-care/hasil-ct0` | Selesai |
| Legacy: Caring CT0 | Dari Caring Regional | `/customer-care/caring-ct0` | Selesai |
| Legacy: Report C3MR | Dari Caring Regional | `/customer-care/report-c3mr` | Selesai |
| Legacy: Hasil C3MR | Dari Caring Regional | `/customer-care/hasil-c3mr` | Selesai |
| Legacy: Caring Leveraging | Dari Caring Regional | `/customer-care/caring-leveraging` | Selesai |
| Legacy: Caring Leveraging 2 | Dari Caring Regional | `/customer-care/caring-leveraging-2` | Selesai |
| QOS > Caring CT0 > Report | Dari QOS | `/customer-care/qos/caring-ct0/report` | Selesai |
| QOS > Caring CT0 > Form | Dari QOS | `/customer-care/qos/caring-ct0/form` | Selesai |
| QOS > Caring CT0 > Winback | Dari QOS | `/customer-care/qos/caring-ct0/winback` | Selesai |
| QOS > Caring CT0 > Combat Churn | Dari QOS | `/customer-care/qos/caring-ct0/combat-churn` | Selesai |
| QOS > Caring C3MR > Caring | Dari QOS | `/customer-care/qos/caring-c3mr/caring` | Selesai |
| QOS > Caring C3MR > Report | Dari QOS | `/customer-care/qos/caring-c3mr/report` | Selesai |
| QOS > Collection > Report | Dari QOS | `/customer-care/qos/collection/report` | Selesai |
| QOS > Churn to Sales | Dari QOS | `/customer-care/qos/churn-to-sales` | Selesai |
| QOS > Kuadran HOTD | Dari QOS | `/customer-care/qos/kuadran-hotd` | Selesai |
| QOS > Scatter KW HOTD | Dari QOS | `/customer-care/qos/scatter-kw-hotd` | Selesai |

**Status Customer Care: 34/34 submenu selesai (100%)**

---

#### DMO (Menu yang sepenuhnya baru)

| Submenu | Dashboard Lama | Dashboard Baru | Status |
|---------|---------------|----------------|--------|
| Dashboard | Tidak ada | `/dmo/dashboard` | Baru, selesai |
| REMAC > Summary | Tidak ada | `/dmo/remac/summary` | Baru, selesai |
| REMAC > Data | Tidak ada | `/dmo/remac/data` | Baru, selesai |
| REACH > Summary | Tidak ada | `/dmo/reach/summary` | Baru, selesai |
| REACH > Data | Tidak ada | `/dmo/reach/data` | Baru, selesai |
| RECAP > Summary | Tidak ada | `/dmo/recap/summary` | Baru, selesai |
| RECAP > Data | Tidak ada | `/dmo/recap/data` | Baru, selesai |
| REACT > Summary | Tidak ada | `/dmo/react/summary` | Baru, selesai |
| REACT > Data | Tidak ada | `/dmo/react/data` | Baru, selesai |
| Leads Digital Order > Summary | Tidak ada | `/dmo/leads/summary` | Baru, selesai |
| Leads Digital Order > Data | Tidak ada | `/dmo/leads/data` | Baru, selesai |

**Status DMO: 11/11 submenu selesai (100%)**

---

## 3. Checklist Fitur per Menu

### 3.1 Home Dashboard

| Fitur | Kebutuhan (dari wawancara) | Status |
|-------|---------------------------|--------|
| KPI Card: Date & Time | Tampilan tanggal dan waktu WIB | Selesai |
| KPI Card: Target Revenue | Target YTD | Selesai |
| KPI Card: Realisasi Revenue | Realisasi YTD | Selesai |
| KPI Card: Achievement | Persentase pencapaian | Selesai |
| Grafik Revenue per Witel | Bar chart target vs realisasi per 4 Witel | Selesai |
| Komposisi POTS vs Non-POTS | Breakdown HSI vs B2B | Selesai |
| Scaling vs Sustain | Breakdown revenue scaling dan sustain | Selesai |
| Login page | Halaman login dengan autentikasi | Selesai |
| Session timeout | Auto-logout setelah 30 menit idle | Selesai |

### 3.2 Revenue Main Dashboard

| Fitur | Status |
|-------|--------|
| Grafik Revenue YTD per Witel | Selesai |
| Breakdown Sustain vs Scaling | Selesai |
| Tabel ringkasan per Witel | Selesai |

### 3.3 B2B Main Dashboard

| Fitur | Status |
|-------|--------|
| Grafik Billcomp YTD | Selesai |
| Grafik Potensi (pipeline) | Selesai |
| Tabel ringkasan per Witel | Selesai |
| Clickable cards ke submenu | Selesai |

### 3.4 HSI Main Dashboard

| Fitur | Kebutuhan (dari wawancara Mbak Putri) | Status |
|-------|---------------------------------------|--------|
| Grafik Sales HSI Monthly | Januari s.d. Desember | Selesai |
| Diagram Channel Composition | SA, AR, LPC, MyID Biskas | Selesai |
| Diagram PSB Bundling vs Non-Bundling | Persentase bundling Prodigi | Selesai |
| Grafik Revenue POTS Scaling | Per Witel, YTD | Selesai |
| Grafik ARPU Scaling POTS per Witel | Average revenue per Witel | Selesai |
| Grafik Bandwidth Speed | Distribusi 50/100/200/300 Mbps | Selesai |

### 3.5 WMS Main Dashboard

| Fitur | Kebutuhan (dari wawancara Mas Zainal) | Status |
|-------|--------------------------------------|--------|
| Rangkuman dari semua menu WMS | Satu halaman overview | Selesai |
| Grafik Sales Performance WiFi | Per Witel | Selesai |
| Grafik Ekosistem WiFi | Per ekosistem | Selesai |
| Grafik Channel WiFi | Per channel | Selesai |

### 3.6 Customer Care Main Dashboard

| Fitur | Kebutuhan (dari wawancara Mas Uki) | Status |
|-------|-----------------------------------|--------|
| KPI Cards Collection | Caring, Collection, Leveraging | Selesai |
| Grafik Performance Overview | Trend caring dan collection | Selesai |

### 3.7 Prodigi Main Dashboard

| Fitur | Status |
|-------|--------|
| Grafik Digital Product Performance | Selesai |
| Grafik 100 Days Progress | Selesai |
| Tabel Ekosistem Sales Prodigi | Selesai |

---

## 4. Perubahan Visualisasi Data

### 4.1 Perubahan Tipe Visualisasi

| Aspek | Dashboard Lama | Dashboard Baru |
|-------|---------------|----------------|
| Tampilan awal | Tabel saja | KPI Cards + Grafik interaktif (Chart.js) |
| Grafik di halaman utama | Tidak ada | 6 grafik per Main Dashboard |
| Tipe grafik | Tidak ada/minimal | Bar Chart, Line Chart, Doughnut/Pie, Area Chart |
| Filter periode | Terbatas | Global filter (MTD, QTD, YTD) dengan date picker |
| Filter wilayah | Terbatas | Dropdown per Witel dengan opsi "All" |
| Export data | Tidak diketahui | Export ke Excel/CSV tersedia |
| Navigasi | Klik submenu satu per satu | Sidebar collapsible + search bar di header |
| Warna tabel | Seragam / kurang kontras | Warna berbeda per skema (biru gelap header, hijau untuk achievement baik, merah untuk perhatian) |
| Responsivitas | Tidak responsif | Responsif (sidebar collapsible, tabel scrollable) |

### 4.2 Preferensi Visual (berdasarkan wawancara Mas Fuad)

| Preferensi | Status Implementasi |
|------------|-------------------|
| Warna utama: Biru (bukan merah) | Selesai |
| Warna grafik: Biru dan Hijau | Selesai |
| Highlight Achievement/Target | Selesai (warna hijau untuk baik, merah untuk perhatian) |
| Format Revenue: YTD | Selesai |
| Format Sales: MTD | Selesai |
| Grafik tidak perlu clickable | Selesai (grafik untuk visualisasi, detail di submenu) |
| Table ringkasan di bawah grafik | Selesai |

---

## 5. Identifikasi Bug dan Potensi Masalah

### 5.1 Build Status

Hasil build production (vite build) pada 15 April 2026:

```
vite v7.3.1 building client environment for production...
2534 modules transformed.
Build time: 9.38s
Exit code: 0 (SUCCESS)
```

**Tidak ditemukan error saat build.**

### 5.2 Warning

| No | Tingkat | Deskripsi | Dampak |
|----|---------|-----------|--------|
| 1 | Warning | Bundle size (2,701 kB) melebihi batas 500 kB | Performa load awal mungkin lambat. Disarankan menerapkan code-splitting dengan dynamic import |

### 5.3 Masalah Routing

| No | Tingkat | Deskripsi | Lokasi |
|----|---------|-----------|--------|
| 1 | Medium | Route duplikat untuk B2B Performance dan Order LOP | `App.jsx` baris 235-253 memiliki route alias `/b2b/pipeline/*` dan `/b2b/report/*` yang menduplikasi `/b2b/order-lop/*` dan `/b2b/report-inputter/*`. Tidak menyebabkan error, namun menambah kompleksitas |
| 2 | Medium | Route `/prodigi/witel`, `/prodigi/ekosistem`, `/prodigi/100-days` mengarah ke EmptyPage, padahal komponen sudah ada di route `/digital/prodigi/*` | `App.jsx` baris 386-388 vs 362-365 |
| 3 | Low | Route `/b2b/bandwidth` didefinisikan dua kali (baris 227 dan 256) | `App.jsx` baris 256 menduplikasi baris 227 |
| 4 | Low | Route `/wms/trend-wms` mengarah ke EmptyPage namun tidak ada di sidebar | `App.jsx` baris 381, tidak akan diakses user |

### 5.4 Halaman EmptyPage

8 route mengarah ke EmptyPage (halaman placeholder tanpa konten):

| No | Route | Keterangan | Rekomendasi |
|----|-------|------------|-------------|
| 1 | `/hsi/partnership` | Landing page untuk Partnership | Redirect ke submenu pertama |
| 2 | `/hsi/gamification/top10-ar` | Top 10 AR belum dibuat | Perlu komponen baru |
| 3 | `/hsi/gamification/top10-sa` | Top 10 SA belum dibuat | Perlu komponen baru |
| 4 | `/hsi/gamification/best-telda` | Best Telda belum dibuat | Perlu komponen baru |
| 5 | `/wms/trend-wifi` | Landing page Trend WiFi | Redirect ke submenu pertama |
| 6 | `/prodigi/witel` | Sudah ada di `/digital/prodigi/witel` | Perbaiki routing |
| 7 | `/prodigi/ekosistem` | Sudah ada di `/digital/prodigi/ekosistem` | Perbaiki routing |
| 8 | `/prodigi/100-days` | Sudah ada di `/digital/prodigi/100-days` | Perbaiki routing |

### 5.5 Potensi Masalah Lain

| No | Tingkat | Deskripsi |
|----|---------|-----------|
| 1 | Info | Semua data masih menggunakan dummy data (hardcoded). Belum terhubung ke backend/API |
| 2 | Info | Fitur Change Password belum diimplementasi (hanya menampilkan `alert()`) |
| 3 | Info | User avatar selalu menampilkan "AU" (Admin User), belum dinamis |
| 4 | Low | HSI Ekosistem (`HsiEkosistem.jsx`) memiliki file komponen tetapi tidak ada route di sidebar Fix Broadband |
| 5 | Low | HSI All Witel (`HsiAllWitel.jsx`) memiliki file komponen tetapi tidak ada di sidebar Fix Broadband |

---

## 6. Fitur yang Belum Tersedia

### 6.1 Fitur yang Benar-benar Belum Diimplementasikan

| No | Fitur | Asal Menu Lama | Status di Dashboard Baru | Prioritas |
|----|-------|---------------|-------------------------|-----------|
| 1 | Gamification: Top 10 AR | Gamification | EmptyPage (belum ada komponen) | Rendah |
| 2 | Gamification: Top 10 SA | Gamification | EmptyPage (belum ada komponen) | Rendah |
| 3 | Gamification: Best Telda | Gamification | EmptyPage (belum ada komponen) | Rendah |
| 4 | Rising Star: Witel | Rising Star | Tidak ada route maupun komponen | Rendah (menurut Mas Fuad, opsional) |
| 5 | Rising Star: Branch | Rising Star | Tidak ada route maupun komponen | Rendah (menurut Mas Fuad, opsional) |
| 6 | Integrasi Backend/API | - | Seluruh data masih dummy | Tinggi (diperlukan untuk produksi) |
| 7 | Notifikasi personal per user | Kebutuhan Mas Uki | Belum ada | Sedang |
| 8 | Download/export PDF per halaman | Kebutuhan manajemen | Belum ada (hanya export Excel) | Sedang |

### 6.2 Fitur yang Sudah Ada tetapi dengan Nama atau Lokasi Berbeda

| No | Nama di Dashboard Lama | Nama/Lokasi di Dashboard Baru | Keterangan |
|----|----------------------|-------------------------------|------------|
| 1 | All Channel (HSI) | Channel (di sidebar Fix Broadband > HSI) | Diganti nama, isi sama |
| 2 | Monitoring Selfi | Work Order (Fix Broadband > HSI > Work Order) | Diganti nama, isi sama + tambahan Add Cleansing |
| 3 | Trend Indibiz > Sales Trend | Periode Report > Sales Trend | Dipindahkan ke Periode Report |
| 4 | Trend Indibiz > ARPU Trend | Periode Report > ARPU Trend | Dipindahkan ke Periode Report |
| 5 | Trend Indibiz > Churn HSI Trend | Customer Care > Caring Collection > Caring CT0 > Churn HSI Trend | Dipindahkan ke Customer Care |
| 6 | Trend Indibiz > CT0 Trend | Customer Care > Caring Collection > Caring CT0 > CT0 Trend | Dipindahkan ke Customer Care |
| 7 | Kendala PI (WiFi) | Monitoring (WMS) | Diganti nama |
| 8 | Partnership (menu terpisah) | Fix Broadband > HSI > Channel / My Activity / KDMP | Dipindahkan ke dalam HSI |
| 9 | Bandwidth (menu terpisah) | B2B > Bandwidth | Dipindahkan ke B2B |
| 10 | QOS (menu terpisah) | Customer Care > QOS (legacy routes) | Dipindahkan ke Customer Care |
| 11 | Caring Regional (menu terpisah) | Customer Care > Caring Collection + legacy routes | Direstrukturisasi |
| 12 | Digital: Witel/Ekosistem/100 Days | Route `/digital/prodigi/*` ada, route `/prodigi/*` EmptyPage | Komponen ada, routing perlu diperbaiki |
| 13 | Gamification: Boost ISE | Fix Broadband > HSI > Gamification > Boost ISE | Dipindahkan ke HSI |
| 14 | HSI HVC | CX > HVC (Customer Care, cross-link ke `/hsi/hvc`) | Dipindahkan ke Customer Care |

### 6.3 Menu Tools

Menu Tools (112 submenu) dari dashboard lama **sengaja tidak dimasukkan** ke dalam redesign karena bersifat khusus Super Admin. Hal ini sesuai dengan keputusan desain yang tercantum dalam dokumen Sitemap Redesign dan dikonfirmasi oleh Mas Fuad. Satu-satunya item dari Tools yang dipindahkan adalah **Selfie Data Add Cleansing** yang kini berada di HSI > Work Order > Add Cleansing.

---

## 7. Estimasi Progress dan Waktu Penyelesaian

### 7.1 Ringkasan Progress per Menu

| Menu | Total Submenu | Selesai | EmptyPage | Belum Ada | Progress |
|------|--------------|---------|-----------|-----------|----------|
| Home Dashboard | 1 | 1 | 0 | 0 | 100% |
| Revenue | 10 | 10 | 0 | 0 | 100% |
| B2B | 33 | 33 | 0 | 0 | 100% |
| HSI (dalam Fix Broadband) | 44 | 41 | 3 | 0 | 93% |
| WMS (dalam Fix Broadband) | 10 | 10 | 0 | 0 | 100% |
| Fix Broadband Main Dashboard | 1 | 1 | 0 | 0 | 100% |
| Prodigi | 4 | 1 | 3 | 0 | 25%* |
| Customer Care | 34 | 34 | 0 | 0 | 100% |
| DMO | 11 | 11 | 0 | 0 | 100% |
| Rising Star | 2 | 0 | 0 | 2 | 0%** |
| **TOTAL** | **150** | **142** | **6** | **2** | **95%** |

> *Catatan Prodigi: Komponen sudah ada di route `/digital/prodigi/*`, hanya routing `/prodigi/*` yang belum diarahkan. Jika routing diperbaiki, progress Prodigi menjadi 100%.

> **Catatan Rising Star: Menurut wawancara dengan Mas Fuad, Rising Star bersifat opsional dan berada di luar menu utama.

### 7.2 Estimasi Progress Keseluruhan

| Kategori | Bobot | Progress | Kontribusi |
|----------|-------|----------|------------|
| Struktur Menu dan Navigasi | 15% | 100% | 15.0% |
| Home Dashboard (KPI + Grafik) | 10% | 100% | 10.0% |
| Main Dashboard per Menu (6 buah) | 15% | 100% | 15.0% |
| Halaman submenu (tabel, grafik, filter) | 30% | 95% | 28.5% |
| Styling dan UI/UX (warna, layout, responsif) | 10% | 95% | 9.5% |
| Routing dan backward compatibility | 5% | 90% | 4.5% |
| Autentikasi dan session management | 5% | 90% | 4.5% |
| Integrasi backend/API | 10% | 0% | 0.0% |
| **TOTAL** | **100%** | - | **87.0%** |

### 7.3 Progress Keseluruhan: **87%**

> Catatan: Angka 87% mencerminkan keseluruhan proyek termasuk integrasi backend. Jika dihitung hanya untuk scope frontend (tanpa integrasi backend), progress frontend berada di **96.7%**.

### 7.4 Estimasi Waktu Penyelesaian

| Item Pekerjaan | Estimasi Waktu | Prioritas |
|---------------|---------------|-----------|
| Perbaiki routing Prodigi (`/prodigi/*` mengarah ke komponen yang benar) | 0.5 hari | Tinggi |
| Buat komponen Gamification Top 10 AR | 1 hari | Rendah |
| Buat komponen Gamification Top 10 SA | 1 hari | Rendah |
| Buat komponen Gamification Best Telda | 1 hari | Rendah |
| Tambahkan HSI Ekosistem dan All Witel ke sidebar | 0.5 hari | Sedang |
| Hapus route duplikat di App.jsx | 0.5 hari | Rendah |
| Implementasi code-splitting (dynamic import) | 1-2 hari | Sedang |
| Implementasi integrasi backend/API | 2-4 minggu | Tinggi |
| **Total (tanpa backend)** | **5-6 hari kerja** | - |
| **Total (dengan backend)** | **3-5 minggu** | - |

### 7.5 Rekomendasi Prioritas

1. **Prioritas Tinggi (segera):** Perbaiki routing Prodigi agar tidak menampilkan EmptyPage
2. **Prioritas Sedang:** Tambahkan halaman Gamification yang masih kosong (Top 10 AR/SA, Best Telda)
3. **Prioritas Sedang:** Tambahkan HSI Ekosistem dan All Witel ke sidebar Fix Broadband
4. **Prioritas Rendah:** Bersihkan route duplikat di App.jsx
5. **Prioritas Masa Depan:** Integrasi backend/API untuk data real-time

---

*Dokumen ini disusun berdasarkan analisis kode sumber di repository hsi-dashboard (branch develop) dan referensi dari folder DASHBOARD SMES yang berisi hasil wawancara dengan Mbak Putri (HSI), Mas Fuad (Programmer), Mas Uki (Customer Care), Mas Zainal (WMS), dan Pak Hari (Manajemen).*
