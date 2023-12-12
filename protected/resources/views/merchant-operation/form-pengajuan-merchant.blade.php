<style>    

.container div {
    display: flex;
    flex-flow: row wrap;
}
        
.row {
    display: table-row; 
}
    
.col {
    display: table-cell; 
    padding: 1em;
    width:50%
}    
</style>

<div>    
    <title>FORM PENGAJUAN MERCHANT {{ strtoupper($data->nama_merchant ?? '') }}</title>
    
    <img src="{{ url('logo/logo-hitam.png') }}" width="150" style="float:right;"/>

    <div style="height:10px"></div>

    <h4 align="center" style="font-size:13px">FORMULIR APLIKASI MERCHANT - M1</h4>
    
    <body>
        <table border="0" style="font-size:12px">
            <tr>
                <td><b>Nomor Regristrasi</b></td>
                <td>&nbsp;&nbsp;:</td>
                <td colspan="5"></td>
            </tr>
        
            <tr>
                <td><b>Pengajuan Sebagai</b></td>
                <td><input type="checkbox" {{ ($data->pengajuan_sebagai == 'Perorangan') ? 'checked': '' }}></td>
                <td>Merchant Perorangan</td>
                <td style="width:50px"></td>
                <td><input type="checkbox" {{ ($data->pengajuan_sebagai !== 'Perorangan') ? 'checked': '' }}></td>
                <td><b>Merchant Badan Usaha</b></td>
                <td>: PT / CV / Firma / Yayasan</td>
            </tr>
        
            <tr>
                <td><b>Status Tempat Usaha</b></td>
                <td><input type="checkbox" {{ ($data->status_tempat_usaha == 'Milik Sendiri') ? 'checked': '' }}></td>
                <td>Hak Milik</td>
                <td style="width:50px"></td>
                <td><input type="checkbox" {{ ($data->status_tempat_usaha == 'Sewa') ? 'checked': '' }}></td>
                <td><b>Sewa</b></td>
                <td></td>
            </tr>
        </table>
        
        <table style="font-size:12px">
            <tr>
                <td><b>Fitur Transaksi : </b></td>
                <td><input type="checkbox"></td>
                <td><b>Kartu Kredit</b></td>
                <td><input type="checkbox"></td>
                <td><b>Kartu Debit</b></td>
                <td><input type="checkbox"></td>
                <td><b>Cicilan</b></td>
                <td><input type="checkbox"></td>
                <td><b>Qris</b></td>
                <td><input type="checkbox"></td>
                <td><b>Debit Transfer</b></td>
                <td><input type="checkbox"></td>
                <td><b>E-Commerce</b></td>
                <td><input type="checkbox"></td>
                <td><b>Lainnya</b>_____________</td>
            </tr>
        </table>
        
        <h4 align="center" style="font-size:16px"><u>DATA PEMILIK USAHA/PEJABAT BERWENANG PADA MERCHANT :</u></h4>
        
        <table style="font-size:12px">
            <tr>
                <td><b>Nama Pemilik Merchant/Pejabat Berwenang *</b></td>
                <td>: {{ $data->nama_pemilik_merchant ?? '' }}</td>
            </tr>
        
            <tr>
                <td colspan="2"><i>Sesuai KTP Pemilik Merchant/Pejabat Berwenang (Perorangan/Badan Usaha)</i></td>
            </tr>
        
            <tr>
                <td><b>Tempat & Tanggal Lahir</b></td>
                <td>: 
                    {{ $data->tempat_lahir ?? '' }} {{ date('d-m-Y', strtotime($data->tanggal_lahir)) }}
                </td>
            </tr>
        
            <tr>
                <td><b>Alamat *</b></td>
                <td>: {{ $data->alamat_domisili ?? $data->alamat_pejabat_berwenang }}</td>
            </tr>
        </table>
        
        <table style="font-size:12px">
            <tr>
                <td colspan="2"><i>Sesuai KTP Pemilik Merchant/Pejabat Berwenang (Perorangan/Badan Usaha)</i></td>
            </tr>
        </table>
        
        <?php $alamat_domisili = ($data->pengajuan_sebagai == 'Perorangan') ? explode(',', $data->alamat_domisili) : explode(',', $data->alamat_pejabat_berwenang); ?>
        
        <table style="font-size:12px">
            <tr>
                <td><b>Kota*</b></td>
                <td>: {{ $alamat_domisili[3] ?? '' }}</td>
        
                <td><b>Provinsi*</b></td>
                <td>: {{ $alamat_domisili[4] ?? '' }}</td>
        
                <td><b>Kode Pos*</b></td>
                <td>: {{ $alamat_domisili[5] ?? '' }}</td>
            </tr>
        </table>
        
        <table style="font-size:12px">
            <tr>
                <td style="width:220px"><b>Nomor Handphone*</b></td>
                <td>: {{ $data->nomor_hp ?? $data->nomor_hp_pengurus }}</td>
                <td style="width:95px"></td>
                <td><b>Email*</b></td>
                <td>: {{ $data->email ?? $data->email_pengurus }}</td>
            </tr>
        </table>
        
        <table style="font-size:12px">
            <tr>
                <td style="width:220px"><b>No.Identitas KTP/Paspor/KITAS (WNA)*</b><br/><i>(Wajib foto asli)</i></td>
                <td valign="top">: {{ $data->nomor_identitas ?? '' }}</td>
                <td style="width:100px"></td>
                <td><b>No. NPWP/KK* </b><br/><i>(Wajib foto asli)</i></td>
                <td valign="top">: {{ $data->npwp ?? '' }}</td>
            </tr>
        </table>
        
        <h4 align="center" style="font-size:16px"><u>DATA MERCHANT/BADAN USAHA :</u></h4>
        
        <table style="font-size:12px">
            <tr>
                <td><b>Nama Merchant Perorangan / Badan Usaha *</b></td>
                <td style="width:48px"></td>
                <td>: {{ $data->nama_merchant ?? '' }}</td>
            </tr>
        </table>
        
        <table style="font-size:12px">
            <tr>
                <td><b>Nama Kontak Merchant Perorangan/Badan Usaha**</b></td>
                <td style="width:10px"></td>
                <td>: {{ $data->nama_pengurus_merchant ?? '' }}</td>
            </tr>
        </table>
        
        <table style="font-size:12px">
            <tr>
                <td colspan="2"><i>Nama kontak yang bertanggung jawab ke Pemilik Merchant/Pejabat Berwenang (perorangan/badan usaha)</i></td>
            </tr>
        </table>
        
        <table style="font-size:12px">
            <tr>
                <td><b>No. Handphone Kontak Merchant**</b></td>
                <td>: {{ $data->bisnis_no_hp ?? '' }}</td>
                <td style="width:135px"></td>
                <td><b>No. Telp Merchant*</b></td>
                <td>: </td>
            </tr>
        </table>
        
        <table style="font-size:12px">
            <tr>
                <td><b>No.NPWP Merchant Badan Usaha *</b></td>
                <td>&nbsp;: {{ $data->npwp_merchant_badan_usaha ?? '' }}</td>
                <td style="width:93px"></td>
                <td><b>Email Merchant*</b></td>
                <td>: {{ $data->bisnis_email ?? '' }}</td>
            </tr>
        
            <tr>
                <td coslpan="3"><i>Wajib foto asli</i></td>
            </tr>
        </table>
        
        <table style="font-size:12px">
            <tr>
                <td><b>Alamat Merchant Perorangan/ Badan Usaha*</b></td>
                <td style="width:40px"></td>
                <td>: {{ $data->alamat_bisnis ?? '' }}</td>
            </tr>
        </table>
        
        <table style="font-size:10px">
            <tr>
                <td colspan="2"><i>(Wajib foto surat keterangan domisili usaha/ plang nama Merchant Perorangan/Badan Usaha)</i></td>
            </tr>
        </table>
        
        <?php $alamat_bisnis = explode(',', $data->alamat_bisnis); ?>
        <table style="font-size:12px">
            <tr>
                <td><b>Kota*</b></td>
                <td>: {{ $alamat_bisnis[3] ?? '' }}</td>
        
                <td><b>Provinsi*</b></td>
                <td>: {{ $alamat_bisnis[4] ?? '' }}</td>
        
                <td><b>Kode Pos*</b></td>
                <td>: {{ $alamat_bisnis[5] ?? '' }}</td>
            </tr>
        </table>
        
        <table style="font-size:12px">
            <tr>
                <td><b>Jenis Usaha *</b></td>
                <td>: {{ $data->jenis_usaha ?? '' }}</td>
                <td style="width:100px"></td>
                <td><b>Deskripsi Produk Yang Dijual</b></td>
                <td>: ___________________</td>
            </tr>
        </table>
        
        <table style="font-size:12px">
            <tr>
                <td colspan="2"><i>Wajib lampirkan Ijin Usaha (Merchant Perorangan) <br/>atau Akta,NIB (Merchant Badan Usaha)</i></td>
                <td style="width:60px"></td>
                <td colspan="2">Wajib foto produk yang dijual</td>
            </tr>
        </table>
        
        <table style="font-size:12px">
            <tr>
                <td><b>Rata-rata Transaksi per Bulan</b></td>
                <td>: Rp. {{ number_format($data->omset_rata_rata) }}</td>
            </tr>
        
            <tr>
                <td colspan="2"><i>lampirkan list/ daftar harga barang/jasa (apabila ada)</i></td>
            </tr>
        </table>
        
        <h4 align="center" style="font-size:16px"><u>DATA BANK : </u>
            <p align="center" style="font-weight:normal; font-size:12px"><i>(wajib foto cover buku tabungan/rekening koran/rekening elektronik/struk transfer ATM)</i></p>
        </h4>
        
        <table style="font-size:12px">
            <tr>
                <td><b>Nomor Rekening Bank Penampung</b></td>
                <td>: {{ $data->nomor_rekening_bank_penampung ?? '' }}</td>
                <td style="width:150px"></td>
                <td><b>Nama Bank* </b></td>
                <td>: {{ $data->nama_bank ?? '' }}</td>
            </tr>
        </table>
        
        <table style="font-size:12px">
            <tr>
                <td><b>Nama Pemilik Rekening Merchant/Badan Usaha*</b></td>
                <td>: {{ $data->nama_pemilik_rekening_merchant_badan_usaha ?? '' }}</td>
            </tr>
        </table>
        
        <table style="font-size:12px">
            <tr>
                <td colspan="2"><i>(Pemilik Rekening Merchant wajib atas nama Pemilik Merchant Perorangan/Badan Usaha)</i></td>
            </tr>
        </table>
        
        <div style="height:5px"></div>
        
        <table style="font-size:12px">
            <tr>
                <td>Hari : {{ nama_hari(date('l')) }}</td>
                <td style="width:300px"></td>
                <td style="text-align:center; position: relative; left:10%">Tanggal : {{ date('d') }}/{{ angka_ke_bulan(date('m')) }}/{{ date('Y') }}</td>
            </tr>
        </table>
        
        <table>
            <tr>
                <td style="text-align:center; font-size:12px"><b>PT Cashlez Worldwide Indonesia Tbk</b></td>
                <td style="width:150px"></td>
                <td style="text-align:center; font-size:12px;"><b>Pemilik Merchant/ Pejabat Berwenang Badan Usaha</b></td>
            </tr>
        
            <tr>
                <td></td>
                <td height="40"></td>
                @if(!empty($data->signature->file))
                    <td style="text-align:center"><img src="{{ url('protected/storage/tanda_tangan/'.$data->signature->file) }}" width="80" height="50"/></td>
                @else
                    <td style="text-align:center"></td>
                @endif
            </tr>
        
            <tr>
                <td style="text-align:center; text-decoration: overline; font-size:12px">Nama Lengkap & Tanda Tangan</td>
                <td></td>
                <td style="text-align:center; text-decoration: overline; font-size:12px">Nama Lengkap & Tanda Tangan</td>
            </tr>
        </table>
    </body>
    
    <p align="justify" style="border-radius:1; font-size:10px;">
    Pemilik/Pejabat Berwenang Merchant Perorangan/BadanUsaha secara sadar telah membaca, mengerti dan bertanggung jawab sepenuhnya
    atas kebenaran dan kesahihan data dan/atau dokumen lainnya yang diserahkan kepada Cashlez dan membebaskan Cashlez dari segala
    klaim atau gugatan atau tuntutan hukum dalam bentuk apapun dan dari pihak mana pun termasuk dari Pemilik/Pejabat Berwenang
    Merchant Perorangan/Badan Usaha sehubungan dengan pengisian dan pemberian Formulir Aplikasi Merchant Baru dan Data/Dokumen
    Merchant Lainnya.
    </p>
    
    <i style="font-size:10px">*Wajib diisi oleh Pemilik /Pejabat Berwenang Merchant Perorangan/Badan Usaha</i><br/>
    <i style="font-size:10px">**Apabila Nama Pemilik/Pejabat Berwenang dan Kontak Person terdapat kesamaan, maka Nama Kontak Person, dan No. Handphone tidak perlu diisi
        Data Bank Rekening merchant wajib diisi sama sesuai dengan data pengajuan, usaha perorangan data rekening wajib di isi sesuai nama pemilik usaha,
        untuk Perusahaan Data rekening wajib diisi menggunakan data perusahaan
    </i>
    
    <div style="page-break-after: always;"></div>
    
    <!-- pasal pasal -->
    <img src="{{ url('logo/logo-hitam.png') }}" width="120" style="float:right">

    <h5 style="text-align:center; font-size:13px; position: relative; left:8%">PERJANJIAN KERJASAMA CAHLEZ DAN MERCHANT</h5>
      
    <p style="font-size:10px"> 
        Bahwa <b>CASHLEZ dan MERCHANT</b> yang bertanda tangan di bawahini, secara bersama-sama disebut sebagai <b>"Para Pihak"</b> 
        dan masing-masing disebut <b>"Pihak"</b>, menjelaskan sebagai berikut:
    </p>
    
    <ol type="1" style="position: relative; right:2%; font-size:10px">
        <li align="justify">
            CASHLEZ adalah suatu perseroan terbuka yang didirikan berdasarkan hukumNegara Republik Indonesia yang bergerak dalam bidang kegiatan jasa 
            Pelayanan Sistem Pembayaran Elektronik
        </li>
    
        <li align="justify">
            MERCHANT adalah suatu perusahaan dan/atau perorangan yang telahtunduk, patuh, dan bertanda tangan kepada syarat dan ketentuan Perjanjian ini
        </li>
    
        <li align="justify">
            MERCHANT bermaksud bekerjasama dengan CASHLEZ, untuk memberikan pelayanan bertransaksi melalui Sistem Pembayaran Elektronik non tunai kepada 
            Pelanggan untuk bertransaksi menggunakan Kartu Kredit, Kartu
            Debit, Qris, maupun Transaksi pembayaran Elektronik non-tunai lainnya.
        </li>
    </ol>
    
    <div class="row" style="font-size:8px">
        <div class="col" >
            <b>PASAL 1.RUANG LINGKUP PERJANJIAN</b>
            <ol type="1" style="position: relative; right: 6%;">
                <li align="justify">
                    Para Pihak sepakat untuk mengadakan kerjasama dalam bidang jasa penerimaan pembayaran 
                    menggunakan Sistem Pembayaran Elektronik Non-tunai Cashlez dan layanan aplikasi mPOS Cashlez.
                </li>
    
                <li align="justify">
                    Cashlez akan meneruskan dana-dana atas transaksi non-tunai berhasil/settlement ke rekening Merchant
                    dalam jangka waktu paling lambat 3 (tiga) hari kerja atau selambat-lambatnya ketika dana sudah diterima
                    dari partner bank ke rekening Cashlez untuk antisipasi pembayaran tertunda dari Partner Bank/NonBank setelah 
                    transaksi dilakukan dan/atau terjadi kendala pada sistem Cashlez, sedangkan untuk
                    transaksi berhasil yang tidak melalui rekening penampungan Cashlez, melainkan diproses langsung oleh
                    Partner Bank/Non-Bank, akan mengikuti ketentuan pembayaran settlement dari masing-masing Partner
                    Bank/Non-Bank ke rekening Merchant yang terdaftar pada Cashlez;
                </li>
    
                <li align="justify"> 
                    Cashlez dengan ini akan melakukan pembayaran kepada Merchant atas transaksi berhasil Merchant
                    yang telah dilakukan settlement dengan terlebih dahulu dikurangi dengan biaya transaksi sebagaimana
                    diatur pada PASAL 3.
                </li>
                <li align="justify">
                    <b>Layanan Cashlez mPOS</b><br/>
                    Fitur kasir mobile yang dapat digunakan untuk seluruh jenis usaha Merchant yang didalamnya terdapat
                    2 (dua) tampilan simple mode dan cashier mode
                </li>
    
                <li align="justify">
                    <b>Layanan Pembayaran</b><br/>
                    Menerima berbagai macam metode pembayaran non-tunai (multi method) baik dengan cara gesek, Insert
                    Card, Contactless, serta QR Payment.
                </li>
    
                <li align="justify">
                    <b>Layanan back-office</b><br/>
                    Untuk melakukan monitor seluruh Transaksi yang terjadi secara real time termasuk namun tidak terbatas
                    pada tanggal, waktu transaksi, status berhasil/ gagal, maupun untuk melihat pencatatan transaksi tunai.
                </li>
    
                <li align="justify">
                    <b>Layanan Cashlez Reader/ Mesin EDC</b> - Alat untuk menerima pembayaran non-tunai menggunakan Kartu
                    Kredit/Kartu Debit
                </li>
    
                <li>
                    <b>Merchant wajib melakukan proses pendaftaran sebagai berikut:</b>
                    <ol type="a" style="position:relative; right:5%">
                        <li align="justify">
                            Merchant perorangan mengisi data seperti nama, nomor telepon, e-mail, nomor Kartu Tanda Penduduk (KTP) dan data lainnya
                        </li>
                        <li align="justify">
                            Merchant perusahaan mengisi data seperti nama, nomor telepon, e-mail, Akta Perusahaan, Nomor
                            Induk Berusaha (NIB) dan data legalitas lainnya
                        </li>
                        <li align="justify">
                            Merchant mengunggah Scan / Screenshot / Capture bukti identitas diri seperti KTP/ Nomor Pajak Wajib
                            Pajak (NPWP) / Foto Selfie dan data lainnya yang dibutuhkan untuk kelengkapan dokumen persyaratan
                            pendaftaran.
                        </li>
    
                        <li align="justify">
                            Merchant telah membaca dan memahami Syarat dan Ketentuan pendaftaran dan ketentuan
                            pembayaran layanan non-tunai.
                        </li>
    
                        <li align="justify">
                            Proses pendaftaran merchant dapat dilakukan melalui situs website Cashlez/ Mobile aplikasi Cashlez/
                            formulir registrasi manual
                        </li>
    
                        <li align="justify">
                            SLA Pendaftaran registrasi merchant adalah sesuai dengan jangka waktu proses dari masing-masing
                            Bank/ Pihak Penyedia Jasa Pembayaran non Tunai lainnya
                        </li>
                    </ol>
                </li>
            </ol>

            <b>PASAL 2. PENGHENTIAN SEMENTARA ATAU SELAMANYA LAYANAN SISTEM PEMBAYARAN ELEKTONIK CASHLEZ</b>
    
            <ol type="1" style="position: relative; right: 6%;">
                <li align="justify">
                    Cashlez setiap saat dapat menghentikan layanan mPOS dan Sistem Pembayaran Elektronik non-tunai,
                    untuk sementara waktu dan/atau selamanya dengan terlebih dahulu memberitahukan kepada Merchant
                    selambat-lambatnya 5 (lima) hari kalender dan kerugian yang timbul akibat penghentian tersebut
                    bukanlah tanggung jawab Cashlez
                </li>
    
                <li align="justify">
                    Penghentian sebagaimana dimaksud dalam Pasal 2 ayat 1 di atas termasuk namun tidak terbatas
                    disebabkan karena alasan-alasan sebagai berikut :
    
                    <ol type="a" style="position:relative; right:5%">
                        <li align="justify">
                            Karena inspeksi, perbaikan, pemeliharaan atau peningkatan sistemCashlez
                        </li>
                        <li align="justify">
                            Karena kegagalan komputer dan/atau handphone dan/atau sambungan telekomunikasi internet dari
                            alat komunikasi Merchant
                        </li>
                        <li align="justify">
                            Karena adanya alasan tertentu berupa melindungi hak-hak dan/atau kepentingan Cashlez, Pemilik
                            Kartu, para Merchant serta hak-hak pihak Penyedia Jasa Pembayaran Lain;
                        </li>
                        <li align="justify">
                            Karena adanya Aktivitas transaksi yang dilarang yang dilakukan oleh Merchant sesuai PASAL 8
                            berdasarkan hasil verifikasi dan investigasi internal Cashlez dan/atau BANK dan/atau Pihak Penyedia
                            Jasa Pembayaran lain
                        </li>
                    </ol>
                </li>
                <li align="justify">
                    Cashlez berhak melakukan penangguhan pembayaran dana transaksi dan penutupan akses Merchant
                    dengan jangka waktu tidak terbatas apabila terjadi transaksi sesuai dengan PASAL 6 dan/ atau Merchant
                    terindikasi dan/atau terbukti Melakukan penyalahgunaan transaksi
                </li>
    
                <li align="justify">
                    Cashlez berhak melakukan penangguhan/pemblokiran akses transaksi Merchant apabila Merchant
                    terindikasi melakukan penyalahgunaan transaksi yang dilarang menurut Perjanjian ini dan/atau
                    peraturan perundang-undangan yang berlaku
                </li>
            </ol>
    
            <b>PASAL 3. BIAYA-BIAYA</b><br/>
    
            <ol type="1" style="position: relative; right: 6%;">
                <li align="justify">
                    Biaya MDR (Merchant Discout Rate) untuk Penggunaan Kartu Kredit dan/atau Kartu Debit maupun layanan
                    pembayaran non tunai lainnya atas transaksi berhasil dapat dilihat pada website resmi Cashlez:
                    <i>https://www.cashlez.com/pricing.html</i>
                </li>
                <li align="justify">
                    Atastransaksi penerimaan kartu kredit dan kartu debit maupun uang elektronik lainnya, Merchant paham
                    dan setuju untuk dibebankan biaya MDR per transaksi yang berhasil/ settled, Atas transaksi yang sudah
                    dilakukan settlement dan Merchant setuju untuk dibebankan biaya per pengiriman dana dan/atau kliring
                    dana apabila bank/ nomor rekening settlement yang didaftrakan berbeda dengan bank/ rekening transfer
                    dari Cashlez.                
                </li>

                <li align="justify">
                    Proses pengiriman dana/ kliring atas transaksi berhasil berlaku sesuai ketentuan undang-undang yang
                    berlaku melalui Sistem Kliring Nasional Bank Indonesia (SKNBI).
                </li>
    
                <li align="justify">
                    Cashlez berhak sewaktu-waktu melakukan perubahan nilai biaya MDR apabila disuatu waktu tertentu
                    terdapat perubahan kebijakan dari internal Cashlez, Bank ataupun penyedia layanan pembayaran non
                    tunai lainnya
                </li>
    
                <li align="justify">
                    Biaya Pembelian/ biaya sewa perangkat akan dituangkan terpisah pada perjanjian ini
                </li>
    
                <li align="justify">
                    Biaya pengiriman Perangkat Cashlez ke Merchant akan disesuaikan dengan biaya pengiriman ekspedisidan
                    akan menjadi tanggung jawab Merchant
                </li>
    
                <li align="justify">
                    Pajak-pajak sehubungan dengan Perjanjian ini akan ditanggung oleh masing-masing Pihak sesuai dengan
                    peraturan perundang-undangan di bidang perpajakan yang berlaku.
                </li>
    
               
            </ol>

            <b>PASAL 4. JANGKA WAKTU</b><br/>
            <ol type="1" style="position: relative; right: 6%;">
                <li align="justify">
                    Perjanjian ini mulai berlaku sejak tanggal ditandatanganinya dan mengikat Para Pihak untuk jangka
                    waktu 1 (satu) tahun, dan dianggap telah diperpanjang secara otomatis untuk waktu yang sama, kecuali
                    diakhiri oleh salah satu Pihak menurut ketentuan ayat (2) Pasal ini.
                </li>

                <li align="justify">
                    Pengakhiran Perjanjian secara sepihak harus dilakukan secara tertulis paling lambat dalam 30 (tiga
                    puluh) hari kalender sebelum berakhirnya Perjanjian, kecuali terjadi pelanggaran/ adanya indikasi
                    <b>"fraud"</b> pada Merchant ataupun transaksi sebagaimana disebutkan dalam PASAL 6 dan PASAL 8 sehingga
                    Perjanjian dapat diakhiri sewaktu-waktu.
                </li>
            </ol>

            <div style="page-break-after: always;"></div>

            <!-- pasal 7 -->
            <b> PASAL 7. KERAHASIAAN & KEBIJAKAN PRIVASI</b><br/>

            <ol type="1" style="position: relative; right:6%">
               
                <li align="justify">
                    Masing-masing Pihak sepakat untuk saling menjaga kerahasiaan informasi/data/dokumen dari pihak lainnya
                    diluar kepentingan penjanjian ini sekalipun para pihak sudah tidak berkerjasama lagi kecuali ada permintaan dari
                    pihak Bank dan/atau Penyedia Jasa Pembayaran lain.
                </li>
    
                <li align="justify">
                    Para Pihak dilarang membocorkan informasi rahasia terkait dengan kerjasama antara dan Merchant kepada pihak
                    mana pun, kecuali dipersyaratkan lain oleh peraturan perundang-undangan
                </li>
    
                <li align="justify">
                    Data nasabah dan/atau data Pelanggan akan diperlukan oleh Cashlez dan Merchant dengan kerahasiaan secara
                    ketat dan Para Pihak tunduk pada peraturan perundang-undangan yang berlaku sehubungan dengan perlindungan
                    konsumen dan perlindungan data pribadi.
                </li>
      

                <li align="justify">
                    Cashlez akan mengumpulkan seluruh data, informasi, dan/atau keterangan dalam bentuk apapun yang
                    mengidentifikasi Merchant, yang dari waktu ke waktu Merchant sampaikan kepada Cashlez atau yang Merchant
                    cantumkan atau sampaikan dalam, pada, dan/atau melalui seluruh layanan Cashlez yang menyangkut informasi
                    mengenai pribadi Merchant, yang mencakup, tetapi tidak terbatas pada; nama lengkap, jenis kelamin,
                    kewarganegaraan, agama, status perkawinan, dan/atau Data Pribadi yang dikombinasikan untuk mengidentifikasi
                    seseorang, dan data lainnya yang tergolong sebagai Data Pribadi berdasarkan Undang –Undang No. 27 Tahun 2022
                    tentang Perlindungan Data Pribadi (“UU PDP”), selengkapnya tertuang pada dokumen Kebijakan Privasi dan dapat
                    diakses pada <i>https://www.cashlez.com/privacy</i>     
                </li>
            </ol>

            <!-- pasal 8 -->
            <b>PASAL 8. KEWAJIBAN TRANSAKSI & LARANGAN TRANSAKSI</b><br/>
    
            <ol type="1" style="position:relative; right:6%">
                <li align="justify">
                    Segala bentuk Transaksi tarik tunai (gesek tunai) dan Double Swipe menggunakan Kartu Kredit, baik milik sendiri
                    maupun milik pihak lain dengan alasan apapun, berdasarkan Peraturan Bank Indonesia No. 11/11/PBI/2009
                    tentang Penyelenggaraan Kegiatan Alat Pembayaran Menggunakan Kartu (APMK).
                </li>
    
                <li align="justify">
                    Merchant dilarang memberikan tambahan nilai Transaksi (Surcharge) kepada Pelanggan Berdasarkan Peraturan
                    Bank Indonesia No. 23/6/PBI/2021 Pasal 52 ayat (1) tentang Penyedia Jasa Pembayaran (PBI PJP) dan Surat
                    Edaran Bank Indonesia No. 25/365/DSSK/Srt/B tanggal 8 Agustus 2023 tentang Pengenaan Biaya Tambahan
                    (Surcharge) Kepada Pengguna Barang dan/atau Jasa
                </li>
    
                <li align="justify">
                    Uang menurut Undang-Undang No. 8 Tahun 2010 tentang Pencegahan dan Pemberantasan Tindak Pidana
                    Pencucian Uang dengan Pidana penjara paling lama 20 (dua puluh) tahun dan denda paling banyak Rp.
                    10.000.000.000 (sepuluh miliar Rupiah). 
                </li>
    
                <li align="justify">
                    Merchant dilarang melakukan tindakan Anti Pencucian Uang dan Pembiayaan Pendanaan Terorisme (APU-PPT)
                    sesuai Peraturan Bank Indonesia No. 19/10/PBI/2017 dengan sanksi berupa teguran tertulis namun
                    tidak terbatas pada penghentian kerjasama sesuai dengan ketentuan yang berlaku.
                </li>
          
                <li align="justify"> 
                    Merchant dilarang menjual barang dan/atau jasa yang melanggar hukum dan/atau Peraturan
                    Perundang-undangan yang berlaku di Indonesia terkait pada transaksi yang menyangkut tentang
                    Pembiayaan Teroris, Narkotika, Pencucian Uang, Penipuan, Perjudian, Pemalsuan, Pornografi dan Senjata
                    Api.
                </li>
    
                <li align="justify">
                    Merchant dilarang melakukan Transaksi penukaran Mata Uang, Jual Beli saham / Reksadana, Jual Beli
                    Mata Uang Digital, Pembiayaan Simpan Pinjam, Pembiayaan Dana Talangan, dan/atau hal lainnya yang
                    dilarang oleh Bank dengan menggunakan Kartu Kredit
                </li>
    
                <li align="justify">
                    Merchant dilarang mengaku dan/atau bertindak seolah-olah sebagai Bank dan/atau Penyedia Jasa
                    Pembayaran lainnya dan/atau sebagai perwakilan dari Cashlez.
                </li>
    
                <li align="justify">
                    Merchant dilarang mendokumentasikan dan/atau menyimpan data kartu Pelanggan atau data Transaksi
                    elektronik Pelanggan lainnya untuk kepentingan apapun
                </li>
    
                <li align="justify">
                    Merchant dilarang melakukan penyalahgunaan sistem mPOS Cashlez baik secara sengaja maupun tidak sengaja.
                </li>
    
                <li align="justify">
                    Merchant dilarang melakukan pembagian nilai transaksi (split transaksi) baik menggunakan kartu
                    maupun uang elektronik.
                </li>
    
                <li align="justify">
                    Merchant dilarang menerima transaksi kartu maupun transaksi uang elektronik lainnya dari pihak yang
                    bukan Pemilik Kartu maupun transaksi titipan.
                </li>
    
                <li align="justify">
                    Merchant dilarang memindah tangankan/ meminjamkan perangkat (Cashlez reader/ EDC) sistemMobile
                    aplikasi maupun pengguna akun portal Cashlez ke Pihak lain tanpa seizin Cashlez.
                </li>
    
                <li align="justify">
                    Merchant dilarang mendokumentasikan dan/atau menyimpan data kartu pelanggan atau data transaksi
                    elektronik pelanggan lainnya dengan alat lain selain sistem Mobile aplikasi Cashlez untuk kepentingan
                    apapun
                </li>
    
                <li align="justify">
                    Merchant dilarang untuk menyimpan, meniru, mengubah dan/atau menyebarkan konten dan fitur
                    layanan namun tidak terbatas pada cara pelayanan Cashlez, Hak Kekayaan Intelektual milik Cashlez.
                </li>
    
                <li align="justify">
                    Merchant dilarang melakukan usaha atau mencoba untuk melakukan upaya pemecahan kode, hacking,
                    cracking, penetrasi virus penggunaan software, shareware, freeware atapun membuat website/mobile
                    aplikasi palsu/ tiruan yang bertujuan untuk mengganggu atau merusak sistem Cashlez
                </li>
    
                <li align="justify">
                    Merchant dilarang melakukan transaksi yang berbeda dengan jenis usaha yang terdaftar di Cashlez.
                </li>
    
                <li align="justify">
                    Merchant dilarang melakukan transaksi refund secara tunai kepada Pelanggan.
                </li>
    
                <li align="justify">
                    Merchant dilarang melakukan transaksi dengan kartu sama atau ganti kartu lain dengan nama pemilik
                    kartu yang sama berkali-kali lebih dari 3 (tiga) kali dengan status <i>APPROVE</i> atau status <i>DECLINE</i>.
                </li>
    
                <li align="justify">
                    Merchant wajib melakukan pencocokan tandatangan dan nama Pelanggan antara di kartu dengan di
                    struk transaksi (khusus Pelanggan dari luar negeri wajib melampirkan foto Passport / KITAS).
                </li>
    
                <li align="justify">
                    Merchant wajib melakukan transaksi menggunakan kurs/ mata uang Rupiah (IDR)
                </li>
    
                <li align="justify">
                    Merchant wajib memberikan informasi kepada Cashlez secara tertulis terkait aktivitas Transaksi
                    Merchant yang ingin dilakukan di luar kota ataupun di luar negeri.
                </li>
    
                <li align="justify">
                    Merchantwajib bekerjasama dengan Cashlezuntuk menyediakan invoice/ nota/ kwitansi atas transaksi
                    yang terjadi dan jika terdapat pengiriman barang wajib melampirkan tanda terima/tanda kirim barang
                    atas setiap transaksi dengan dibubuhi Cap/ Stempel Merchant(apabila ada) sesuai dengan bidang usaha
                    yang didaftarkan kepada Cashlez
                </li>
    
                <li align="justify">
                    kepada Cashlez adalah benar dengan bidang usaha sesuai dengan ketentuan undang-undang yang
                    berlaku, apabila ditemukan fraud pada dokumen maupun kelengkapannya maka Cashlez berhak
                    sewaktu-waktu menonaktifkan akun merchant untuk login ke aplikasi maupun portal dan Cashlez
                    dibebaskan dari segala tuntutan maupun gugatan dikemudian hari.
                </li>
    
                <li align="justify">
                    Penggunaan layanan pembayaran yang disediakan oleh Cashlez kepada Merchant wajib sesuai bidang
                    usaha pada saat pendaftaran merchant, dan Merchant wajib menginformasikan kepada Cashlez apabila
                    bidang usaha yang didaftarkan kepada Cashlez terjadi perubahan.
                </li>
    
                <li align="justify">
                    Transaksi pembayaran menggunakan kartu wajib menggunakan CHIP dan PIN. Merchant dilarang untuk
                    meminta PIN/ OTP/ Password milik pelanggan
                </li>
    
                <li align="justify">
                    BI No.17/52/DKSP tahun 2015 perihal Implementasi Standar Nasional Teknologi Chip dan Penggunaan
                    Personal Identification Number Online 6 (Enam) Digit untuk Kartu ATM dan/atau Kartu Debet yang
                    Diterbitkan di Indonesia.
                </li>

                <li align="justify">
                    Cashlez berhak sewaktu-waktu untuk menghentikan layanan dan/atau mengakhiri kerjasama dengan
                    Merchant, apabila kemudian hari diketemukan adanya informasi Blacklist Merchant maupun Person In
                    Charge (PIC) Merchant dari hasil pemeriksaan kembali oleh internal Cashlez, dari Bank dan/atau dari
                    Penyedia Jasa Pembayaran lain terkait pengajuan pendaftaran Merchant.
                </li>
    
                <li align="justify">
                    Apabila terdapat transaksi yang dianggap tidak sah dan/atau tidak diakui oleh Cashlez dan/atau Pemilik
                    Kartu dan/atau Bank dan/atau Penyedia Jasa Pembayaran lain, namun Merchant tetap memproses
                    transaksi tersebut maka kerugian yang timbul akan menjadi tanggung jawab Merchant sepenuhnya.
                </li>
    
                <li align="justify">
                    Merchant wajib untuk memastikan atas setiap transaksi penjualan yang terjadi yang dapat dilihat pada
                    menu History Transaksi dan/ atau portal Merchant sesuai dengan status transaksi yang tertera.
                </li>
            </ol>

            <!-- pasal 9 -->
            <b>PASAL 9. PERNYATAAN DAN JAMINAN MERCHANT</b><br/>

            <ol type="1" style="position:relative; right:6%">
                <li align="justify">
                    Merchant menjamin memberikan data dan/atau dokumen dan/atau pernyataan dan/ atau
                    keterangan yang dibutuhkan oleh Cashlez dan Bank atau Penyedia Jasa Pembayaran lain dalam
                    melakukan proses permohonan hubungan kerjasama Pendaftaran Merchant untuk kebutuhan
                    layanan pembayaran non tunai adalah benar, sah secara hukum dan sesuai dengan ketentuan dan
                    undang-undang yang berlaku.
                </li>

                <li align="justify">
                    Merchant setuju memberikan ganti kerugian kepada Cashlez terhadap tagihan, kerugian, biaya dan
                    tuntutan apapun sehubungan ketidaksesuaian dari pernyataan Merchant.
                </li>

                <li align="justify">
                    Semua dokumen yang diterima oleh Cashlez dan Bank atau Penyedia Jasa Pembayaran Lain
                    diperlakukan asli dan sah dari Merchant tanpa kewajiban Cashlez untuk membuktikan atau
                    mengkonfirmasinya kepada Merchant terlebihdahulu.
                </li>

                <li align="justify">
                    Merchant tidak dalam keadaan Blacklist oleh BANK dan/atau Penyedia Jasa Pembayaran lain dan
                    Cashlez berhak melakukan pemeriksaan terhadap hal itu.
                </li>

                <li align="justify">
                    Merchant mempunyai hak dan wewenang dalampenggunaan Sistem Pembayaran Elektronik non tunai Cashlez
                </li>

                <li align="justify">
                    Merchant bertanggung jawab atas setiap transaksi yang dilakukan beserta kerugian yang
                    ditimbulkan dan bersedia diproses berdasarkan hukum dan peraturan perundang-undangan yang
                    berlaku di Indonesia
                </li>
            </ol>

            <div style="page-break-after: always;"></div>

            <ol start="2" type="1" style="position: relative; right:6%">
                
            </ol>

            <!-- pasal 12 -->
            <ol type="1" start="11" style="position:relative; right:6%">
            
               
    
                <li align="justify">
                    Apabila merchant melakukan pembelian perangkat, bahwa Perangkat yang dibeli oleh Merchant bersifat beli
                    putus, Merchant tidak dapat mengembalikan Perangkat tersebut dalam bentuk apapun, termasuk apabila
                    Merchant tidak dapat menggunakan Perangkat dikarenakan terblokirnya akun perangkat dan/atau layanan
                    Merchant karena adanya indikasi penyalahgunaan transaksi yang terjadi, segala kerugian yang timbul
                    dikarenakan adanya indikasi penyalahgunaan transaksi akan menjadi beban dan tanggung jawab Merchant,
                    dengan ini Merchant membebaskan Cashlez dari segala kerugian ataupun tuntutan hukum yang timbul
                    dikemudian hari.
                </li>
           
                <li align="justify">
                    Penempatan Perangkat wajib sesuai lokasi/alamat usaha <b>Merchant</b> yang telah terdaftar pada <b>Cashlez</b> dan
                    apabila <b>Merchant</b> pindah lokasi usaha dan/atau memiliki cabang usaha lain maka <b>Merchant</b> wajib menghubungi
                    pihak <b>Cashlez</b>
                </li>
    
                <li align="justify">
                    Cashlezberhak untuk melakukan perubahan harga Perangkat, Merchant Discout Rate (MDR), maupun syaratdan
                    ketentuan yang diatur olehCashlez dengan atautanpa pemberitahuan terlebih dahulu ke Merchant
                </li>

                <li align="justify">
                    Cashlez berhak sewaktu-waktu melakukan kunjungan untuk keperluan investigasi dan/atau verifikasi ke lokasi
                    usaha Merchant yang terdaftar di Cashlez.
                </li>

                <li align="justify">
                    Dengan ditandatanganinya formulir registrasi ini, Merchant menyatakan telah mengerti dan menyetujui seluruh
                    ketentuan dan dengan ini membebaskan Cashlez dari segala tuntutan dan kerugian yang timbul mengenai
                    pelaksanaan penyewaan ini.
                </li>
                
                <li align="justify">
                    Merchant menyatakan tunduk dan terikat terhadap Perjanjian ini berikut dengan Syarat dan Ketentuan
                    sebagaimana tercantum pada website Cashlez yang akan disampaikan dan/atau diposting secara berkala
                    menyesuaikan dengan peraturan perundang-undangan yang berlaku di Indonesia.
                </li> 

                <li align="justify">
                    Dalam setiap pertanyaan, komunikasi, keluhan, kritik, saran dan/atau pengaduan, Merchant dan/atau
                    Pelanggan dapat mengakses layanan pengaduan dan perlindungan konsumen Cashlez Care
                    support@cashlez.com atau melalui nomor WhatsApp : 0811-9118-155 / 0813-8080-7899
                </li>
            </ol>
        </div>
    
        <!-- right side -->
        <div class="col">

         
            
            <!-- pasal 5 -->
            <b>PASAL 5. PENGAKHIRAN PERJANJIAN</b><br/>
            <ol type="1" style="position: relative; right: 6%;">
                <li align="justify">Perjanjian dapat diakhiri dan/atau dibatalkan dengan alasan :
    
                    <ol type="a" style="position:relative; right:5%">
                        <li align="justify">
                            Merchant tetap melakukan transaksi yang dilarang oleh Cashlez setelah Merchant mendapatkan
                            maksimal 1 (satu) kali peringatan tertulis dari Cashlez.
                        </li>

                        <li align="justify">
                            Merchant melakukan peretasan dan/atau pemindahtanganan dan/atau perusakan dengan sengaja
                            terhadap Perangkat dan/atau Sistem Aplikasi POS/ Layanan Pembayaran Elektronik non-tunai Cashlez
                            untuk tujuan tertentu yang tidak diperkenankan oleh Cashlez.
                        </li>
            
                        <li align="justify">
                            Apabila dikemudian hari, Cashlez menemukan fakta bahwa terdapat adanya tindakan pemalsuan
                            identitas Pemilik Merchant dan/atau identitas Merchant dan/atau keterangan dan/atau pernyataan
                            Merchant tidak sesuai dengan keadaan sebenarnya maka Cashlez berhak sewaktu-waktu
                            membatalkan hubungan kerjasama dan melakukan penghentian akses transaksi Merchant dan
                            penghentian penggunaan Perangkat serta penahanan dana transaksi (apabila ada) tidak dibayarkan
                            oleh Cashlez kepada Merchant dengan jangka waktu tidak terbatas dan Cashlez akan menyerahkan
                            hal ini kepada Pihak Berwajib sesuai dengan peraturan perundang-undangan yang berlaku di Indonesia.
                        </li>
                    </ol>
                </li>
    
                <li align="justify">
                    Pengakhiran perjanjian tidak mempengaruhi hak dan kewajiban serta tanggung jawab masing-masing
                    Pihak yang masih harus dipenuhi berdasarkan perjanjian ini yang timbul sebelum pengakhiran.
                </li>
            </ol>

            <b>PASAL 6. CHARGEBACK/REFUND/SANGGAHAN TRANSAKSI</b><br/>

            <ol type="1" style="position:relative; right:6%">
                
                <li align="justify">
                    Chargeback adalah penagihan kembali atas pembayaran yang telah dilakukan oleh Cashlez kepada Merchant.
                </li>
                
                <li align="justify">
                    Refund adalah pengembalian pembayaran oleh Cashlez kepada Merchant atas pembatalan transaksi mPOS
                </li>
                <li align="justify">
                    Sanggahan transaksi adalah transaksi yang telah berhasil terjadi pada sistem Cashlez dan tidak diakui/disetujui
                    oleh Pemegang Kartu atau Bank Penerbit Kartu atau Bank Pemroses Transaksi.
                </li>
    
                <li align="justify">
                    Jangka waktu proses klarifikasi Merchant adalah 3 (tiga) hari kerja setelah informasi sanggahan diterima oleh
                    Merchant melalui Cashlez.
                </li>
    
                <li align="justify">
                    Jika terjadi sanggahan dengan kondisi dana sudah transfer ke Merchant maka Merchant wajib membayarkan
                    besarnya nilai sanggahan secara penuh dalam kurun waktu paling lambat 7 (tujuh) hari kerja setelah informasi
                    sanggahan diterima.
                </li>
    
                <li align="justify">
                    Jika terjadi sanggahan dengan kondisi dana belum di transfer ke Merchant maka Cashlez tidak akan melakukan
                    transfer dana tersebut kepada Merchant dengan nominal sejumlah sanggahan dan/atau pendebetan dari Pihak
                    Bank dalam jangka waktu 120 (seratus dua puluh) hari kerja terhitung dari informasi sanggahan yang Cashlez
                    terima untuk mengantisipasi terjadinya sanggahan transaksi/pendebetan dana dari Pihak Bank kepada Cashlez
                    dihari berikutnya. Apabila lebih dari 120 (seratus dua puluh) hari masih terjadi sanggahan oleh pelanggan maka
                    Cashlez akan melanjutkan untuk tidak melakukan transfer dana tersebut kepada Merchant dalam jangka waktu
                    540 (lima ratus empat puluh) hari. Apabila Pihak Bank tidak melakukan pendebetan dana setelah jangka waktu
                    tersebut di atas maka Cashlez akan melakukan transfer dana senilai dana sanggahan yang ada pada Cashlez
                    kepada Merchant. 
                </li>
    
                <li align="justify">
                    Pembayaran atas denda ataupun <i>chargeback</i> ditransfer ke rekening PT Cashlez Worldwide Indonesia Tbk dimana
                    informasi data rekeningnya akan disampaikan terpisah pada dokumen <i>Invoice</i>.
                </li>
    
                <li align="justify">
                    Cashlezdibebaskan dari tanggung jawab atas kerugian yang diderita oleh Merchant apabila terjadi transaksi yang
                    diduga maupun telah melanggar peraturan perundang-undangan yang berlaku di Indonesia serta melakukan
                    aktivitas transaksi yang dilarang sesuai Pasal 8 perjanjian ini.                
                </li>
    
                <li align="justify">
                    Cashlez berhak untuk menutup layanan pada akun Pengguna apabila terjadi Chargeback yang melebihi batasan
                    waktu yang diatur oleh Bank atau keputusan internal berdasarkan regulasi dan pengecekan internal Cashlez
                </li>
    
                <li align="justify">
                    Apabila terdapat Chargeback, maka :
                    <ol type="a" style="position: relative; right:5%">
                        <li align="justify">Merchant wajib untuk memiliki Invoice pelanggan;</li>
                        <li align="justify">
                            Merchant wajib untuk melampirkan dokumen transaksi dan kelengkapan dokumen lainnya yang diminta oleh
                            Cashlez/ Bank/ Penyedia layanan pembayaran digital lainnya
                        </li>
                        <li align="justify">
                            Merchant wajib untuk melampirkan surat jalan atas transaksi penjualannya.
                        </li>
                    </ol>
                </li>
    
                <li align="justify">
                    Segala denda yang dibebankan oleh Bank maupun lembaga penyedia jasa sistem pembayaran lainnya sehubungan
                    dengan dilampauinya batas toleransi Chargeback oleh Pihak Bank dan/atau ketentuan lembaga jasa sistem
                    pembayaran lainnya terkait dengan Chargeback, wajib ditanggung oleh Merchant. Dengan ini Cashlez diberikan
                    kuasa penuh untuk memotong langsung dana milik Merchant dari tagihan transaksi yang seharusnya diterima
                    oleh Merchant untuk keperluan pembayaran denda yang dimaksud
                </li>
    
                <li align="justify">
                    Apabila terjadi Chargeback oleh Pelanggan yang dikarenakan oleh penipuan atau ketidakpuasan Pelanggan, maka
                    Merchant memiliki tanggung jawab penuh atas Chargeback tersebut dan bersedia untuk membayar kerugian
                    tersebut serta melepaskan Cashlez dari tanggung jawab atas Chargeback tersebut.
                </li>
    
                <li align="justify">
                    Merchant wajib bekerja sama dengan Cashlez melakukan komunikasi dalam menangani proses chargeback yang
                    diinformasikan oleh pelanggan kepada Cashlez melalui Bank dan/atau refund yang dimintakan oleh Bank melalui
                    Cashlez kepada Merchant sampai dengan permasalahan tersebut dinyatakan selesai.
                </li>
    
                <li align="justify">
                    Jika permasalahan yang dimaksud di atas tidak selesai maka Merchant wajib menanggung biaya kerugian yang
                    timbul atas Sanggahan Transaksi dan/atau <i>Chargeback</i> dan/atau refund dari Pihak Bank dengan memberikan
                    kuasa kepada Cashlezuntuk melakukan pemotongan dana yang dimiliki Merchant untuk melakukan pembayaran
                    sebesar nominal sanggahan transaksi dan/atau chargeback dan/atau <i>refund</i>.
                </li>
    
                <li align="justify">
                    Jika dana Merchant tidak mencukupi maka Merchant wajib untuk melakukan transfer pembayaran kepada
                    Cashlez sebesar nominal yang disanggah.
                </li>
    
                <li align="justify">
                    Apabila Merchant ingin membatalkan transaksi (Refund) dimana dana yang sudah di transfer ke rekening
                    Merchant, maka wajib untuk mengirimkan bukti dan dokumen pendukung sebagai berikut:
    
                    <ol type="a" style="position:relative; right:5%">
                        <li align="justify">Surat permohonan pembatalan transaksi;</li>
                        <li align="justify"><i>Invoice</i>/ bukti transaksi pelanggan; dan</li>
                        <li align="justify">Bukti transfer pengembalian dana (<i>Refund</i>).</li>
                    </ol>
                </li>
    
                <li align="justify">
                    Proses Pengajuan Refund maksimal 7 (tujuh) hari kerja sejak tanggal transaksi terjadi dan akan dibayarkan apabila
                    proses pengecekan Para Pihak selesai dan disepakati oleh Para Pihak.
                </li>
    
                <li align="justify">
                    Cashlez tidak akan melakukan proses pengembalian dana (Refund) dimana Merchant melakukan proses
                    pengembalian dana kepada Pelanggan dalam bentuk cash/ tunai dan tidak ada dokumen pendukung atas
                    pengembalian dana secara cash dan Cashlez dibebaskan dari segala kerugian yang akan timbul
                </li>

                <li align="justify">
                    Seluruh bukti dokumentasi transaksi yang dikirimkan kepada Cashlez dalam hal pemenuhan bukti transaksi
                    indikasi Chargeback atau Refund sesuai dengan Bidang usaha yang didaftarkan kepada Cashlez, apabila terdapat
                    perbedaan, maka Merchant wajib bertanggung jawab atas seluruh transaksi dan kerugian yang terjadi, dan
                    membebaskan Cashlez dari segala tuntutan maupun gugatan yang akan kemungkinan akan timbul pada kemudian
                    hari.
                </li>
    
                <li align="justify">
                    Seluruh proses Chargeback/ refund akan dilakukan dari Cashlez ke Bank Pemroses transaksi (Acquiring Bank) dan/
                    atau Penyedia layanan pembayaran (non-Bank) yang bekerjasama dengan Cashlez untuk selanjutnya diproses ke
                    masing-masing pengguna melalui Bank Penerbit Kartu maupun Penyedia Penerbit Layanan Pembayaran non-tunai
                    sesuai dengan SLA dan ketentuan yang berlaku pada masing-masing Bank/ Partner non Bank.
                </li>
                
            </ol>

            <div style="page-break-after: always;"></div>

             <!-- pasal 9 -->
            <ol type="1" start="7" style="position: relative; right:6%">
             
                <li align="justify">
                    1 (satu) Merchant ID (MID) hanyadiperkenankanuntuk1 (satu)JenisUsaha Merchant/Badan Usaha.
                </li>
    
                <li align="justify">
                    1 (satu) unit Perangkat hanya diperkenankan digunakan maksimal pada 3 (tiga) User ID
                    Merchant/BadanUsaha.
                </li>
    
                <li align="justify">
                    Merchant menjamin memiliki fisik toko dan/atau fisik badan usaha yang dapat dibuktikan.pasal 10
                </li>
    
                <li align="justify">
                    Merchant menjamin bahwa seluruh transaksi yang melibatkan data nasabah dan/atau data
                    Pelanggan terikat dengan kewajiban kerahasiaan secara ketat dan berdasarkan kepatuhan terhadap
                    peraturan perundang-undangan yang berlaku.
                </li>
    
                <li align="justify">
                    Merchant menjamin bahwa diwakili oleh orang yang berhak dan berwenang sepenuhnya untuk
                    membuat dan menandatangani formulir pendaftaran dan perjanjian ini, dan menjamin bahwa segala
                    keterangan yang diberikan sehubungan dengan perjanjian ini adalah benar adanya dan segala
                    aktivitas transaksi yang menyalahi aturan maupun ketentuan yang berlaku dapat dipertanggung
                    jawabkan; apabila dikemudian hari dinyatakan bahwa keterangan yang diberikan tidak sesuai, maka
                    Merchant membebaskan Cashlez dari segala tuntutan maupun gugatan;
                </li>
            </ol>

            <b> PASAL 10. PENAHANAN DANA TRANSAKSI</b><br/>
            <ol type="1"  style="position: relative; right: 6%;">
                <li align="justify">
                    Cashlez sewaktu-waktu dapat melakukan penahanan dana transaksi secara sementara atas transaksi
                    berhasil yang akan diteruskan ke Rekening Merchant dengan pemberitahuan secara tertulis;
                </li>
    
                <li align="justify">
                    Cashlez mendapatkan informasi dari Pihak Bank atau melalui pengecekan hasil internal Cashlez
                    mengenai indikasi dan/atau bukti yang menunjukkan bahwa Merchant melakukan transaksi
                    chargeback/ voucher membership/tarik tunai kartu kredit/ ataupun penipuan mengatasnamakan dari
                    Bank/ pencucian uang/ pemalsuan transaksi dan/atau memalsukan kartu untuk melakukan transaksi
                    dan/atau transaksi yang berpotensi terjadinya chargeback dan sejenisnya, serta melakukan larangan
                    aktivitas transaksi.
                </li>
    
                <li align="justify">
                    Merchant dapat menyampaikan tanggapan atas dugaan tersebut dengan menyertakan bukti-bukti
                    terkait yang menunjukkan bahwa Merchant tidak pernah melakukan transaksi chargeback/ penjualan
                    voucher membership/ tarik tunai kartu kredit/ ataupun penipuan mengatasnamakan Bank dengan tujuan
                    pencucian uang/ pemalsuan transaksi dan/atau memalsukan kartu untuk melakukan transaksi dan bukti-bukti
                    lainnya yang dapat disertakan untuk menyatakan keabsahan transaksi.
                </li>

                <li align="justify">
                    Batas waktu penahanan dana transaksi oleh Cashlez tidak terbatas waktu atas keluhan chargeback /refund /
                    sanggahan transaksi dari Bank maupun Pemegang Kartu sampai dengan Merchant dapat membuktikan bahwa
                    tidak pernah melakukan transaksi penjualan voucher membership /tarik tunai kartu kredit /ataupun penipuan
                    mengatasnamakan Bank untuk tujuan pencucian uang /pemalsuan transaksi dan/atau memalsukan kartu untuk
                    melakukan transaksi dan/atau transaksi yang berpotensi terjadinya chargeback dan sejenisnya, Cashlez wajib
                    meneruskan dana transaksi tersebut kepada Rekening Merchant selambat-lambatnya 14 (empat belas) hari
                    kerja setelah adanya kesepakatan antara kedua belah pihak.
                </li>
    
                <li align="justify">
                    Apabila Merchant tidak dapat melakukan pembuktian secara konkrit bahwa Merchant tidak pernah melakukan
                    dugaan terjadinya transaksi penjualan voucher membership/ tarik tunai kartu kredit/ ataupun penipuan
                    mengatasnamakan dari Bank/ pencucian uang/ pemalsuan transaksi dan/atau memalsukan kartu untuk
                    melakukan transaksi dan/atau transaksi yang berpotensi terjadinya chargeback dan sejenisnya, maka Merchant
                    harus mempertanggungjawabkan sepenuhnya atas keluhan tersebut.
                </li>
    
                <li align="justify">
                    Cashlez berhak melakukan penangguhan pembayaran transaksi sesuai dengan jumlah nominal atas sanggahan
                    transaksi/ chargeback/ refund/ Fraud.
                </li>
            </ol>

            <b>PASAL 11. PENGHENTIAN LAYANAN DAN FITUR</b><br/>
    
            <ol type="1" style="position:relative; right:6%">
                <li align="justify">
                    Cashlez sewaktu-waktu dapat menghentikan layanan maupun akun Merchant secara sementara dan/atau
                    selamanya yang disediakan dengan alasan-alasan sebagai berikut:
                    
                    <ol type="a" style="position:relative; right:5%">
                        <li align="justify">
                            Melindungi hak-hak dan/atau kepentingan Cashlez, Pemegang Kartu, Bank, Penyedia pembayaran digital.
                        </li>
    
                        <li align="justify">
                            Terduga dan/atau terindikasi terlibat melakukan penyalahgunaan dan/atau penyimpangan transaksi
                            sebagaimana dimaksud dalam, kecuali terdapat klarifikasi dari Merchant bahwa transaksi yang dilarang tidak
                            pernah terjadi.
                        </li>
    
                        <li align="justify">
                            Atas rekomendasi dari Bank Pemroses Transaksi untuk segera dilakukan penghentian pemakaian layanan oleh Merchant.
                        </li>
    
                        <li align="justify">
                            Atas aturan atau regulasi yang dimiliki Cashlez dalam hal penghentian layanan maupun fitur.
                        </li>
    
                        <li align="justify">
                            Sedang dilakukan peningkatan dan pemeliharaan sistem (maintenance) oleh Cashlez
                        </li>
    
                        <li align="justify">
                            Jika salah satu Pihak dinyatakan “Insolvent” dan/ atau Pailit dan/atau dicabut izin usaha oleh Pemerintah
                        </li>
    
                        <li align="justify">
                            Karena kegagalan sistem komputer dan/atau sambungan telekomunikasi (koneksi internet dari alat
                            Komunikasi Merchant
                        </li>
    
                        <li align="justify">
                            Melakukan perubahan Jenis usaha dan/ atau produk usaha yang bertentangan dan/ atau melanggar ketentuan
                            dengan norma-norma kesusilaan, kesopanan, undang-undang dan peraturan-peraturan lainnya yang berlaku di
                            Indonesia termasuk tetapi tidak terbatas kepada peraturan yang terkait dengan perbankan baik di Indonesia
                            maupun dari Visa dan/atau Mastercard, HAKI, teknologi dan informatika, telekomunikasi.
                        </li>
    
                        <li align="justify">
                            Melakukan tindakan Fraud dan telah diperingatkan secara tertulis
                        </li>
                    </ol>
                </li>

                <li align="justify">
                    Segala kerugian yang timbul akibat dari penghentian/penangguhan sementara atau selamanya akses Merchant
                    dan layanan sistem pembayaran elektronik Cashlez oleh Merchant yang tidak dapat digunakan karena adanya
                    penghentian layanan bukan menjadi tanggung jawab Cashlezdan dengan ini secara hukum membebaskan Cashlez
                    dari segala tuntutan dan/atau guggatan yang timbul akibat gagal atau terganggunya pelaksanaan transaksi.                
                </li>
               
            </ol>
           
            <b>PASAL 12. LAIN-LAIN</b><br/>

            <ol type="1" style="position:relative; right:6%">
                <li align="justify">
                    Para Pihak dibebaskan dari tanggung jawab atas keterlambatan atau kegagalan dalam memenuhi kewajiban yang
                    tercantum dalam perjanjian ini, yang disebabkan atau diakibatkan oleh force majeure yaitu kejadian di luar
                    kekuasaan masing-masing Pihak untuk mengatasinya;
                </li>

                <li align="justify">
                    Peristiwa yang dapat digolongkan force majeure adalah gempa bumi, angin topan, banjir, wabah penyakit, adanya
                    perang, peledakan, sabotase, revolusi, pemberontakan, huru-hara, secara nyata berpengaruh terhadap
                    pelaksanaan perjanjian;
                </li>

                <li align="justify">
                    Apabila terjadi force majeure maka Pihak yang terkena force majeurewajib memberitahukan secara tertulis kepada
                    Pihak lainnya selambat-lambatnya dalam waktu 3 (tiga) kalender setelah terjadinya force majeure. Pihak yang
                    terkena force majeure wajib berusaha semaksimal mungkin untuk memulai kembali kewajibannya;
                </li>

                <li align="justify">
                    Kelalaian dan/atau keterlambatan Pihak dalam memenuhi kewajibannya mengakibatkan tidak dianggapnya
                    telah terjadi force majeure dan Para Pihak akan mendiskusikan kembali terkait pemenuhan kewajiban yang
                    terkena akibat dari force majeure tersebut;
                </li>

                <li align="justify">
                    Seluruh hak atas kekayaan intelektual yang terdapat pada website dan aplikasi Cashlez termasuk didalamnya
                    hak cipta, desain industri, paten, merek maupun Hak Kekayaan Intelektual lainnya seperti logo, foto, gambar,
                    nama, kata, huruf-huruf, angka-angka, tulisan, susunan warna dan kombinasi dari unsur-unsur adalah milik
                    Cashlez secara penuh. Pengguna website dan aplikasi Cashlez dilarang untuk meniru, memperbanyak, atau
                    menggunakannya untuk kepentingan dan dengan cara apapun tanpa persetujuan tertulis dahulu dari Cashlez
                </li>

                <li align="justify">
                    Masing-masing Pihak tidak akan menggunakan hak atas kekayaan intelektual dari Pihak lainnya dalam bentuk
                    apapun, termasuk tetapi tidak terbatas pada merek dagang, nama atau logo Masing-masing Pihak baik yang
                    belum dan/atau telah terdaftar di Direktorat Jenderal Hak Atas Kekayaan Intelektual tanpa adanya persetujuan
                    tertulis terlebih dahulu dari Pihak lainnya serta Masing-masing Pihak menyatakan dan menjamin bahwa
                    pemberian dokumen atau Salinan dari merek dagang, nama atau logo Pihak lainnya tidak boleh dianggap sebagai
                    pemberian hak opsi atau lisensi atau hak-hak kepemilikan intelektual lainnya, baik kini maupun masa yang akan
                    datang.
                </li>

                <li align="justify">
                    Hal-hal yang belum diatur dalam Perjanjian ini akan diatur lebih lanjut terpisah secara tertulis baik dalam suatu
                    Addendum dan/atau Syarat dan Ketentuan sebagaimana tercantum pada website Cashlez dan segala ketentuan
                    tambahan yang belum diatur dalam perjanjian ini akan tetap mengikat
                </li>

                <li align="justify">
                    Seluruh lampiran/ addendum/ maupun dokumen lainnya yang timbul atas Kerjasama Cashlez dengan merchant
                    adalah merupakan satu kesatuan yang mengikat dari perjanjian Cashlez dengan Merchant
                </li>

                <li align="justify">
                    Merchant sepakat untuk membebaskan dari segala tanggung jawab atas tuntutan hukum dan/atau kerugian
                    material dan imaterial oleh Merchant akibat dari penangguhan pembayaran dana transaksi dan/atau penutupan
                    akses Transaksi Merchant dan/atau penutupan akses Perangkat Merchant dikarenakan terjadi transaksi sesuai
                    dengan PASAL 6 dan Merchant terindikasi dan/atau terbukti melakukan penyalahgunaan transaksi sesuai
                    dengan PASAL 8.
                </li>
    
                <li align="justify">
                    Cashlez berhak untuk menyimpan setiap informasi data dan/atau dokumen Merchant yang sudah diserahkan
                    kepada Cashlez sebagai dokumentasi
                </li>
            </ol>

            <div style="page-break-after: always;"></div>
    
            <table>
                <tr>
                    <td style="font-size:9.8px;">Hari : {{ nama_hari(date('l')) }}</td>
                    <td style="width:100px"></td>
                    <td style="font-size:9.8px;">Tanggal : {{ date('d') }}/{{ angka_ke_bulan(date('m')) }}/{{ date('Y') }}</td>
                </tr>
            </table>
            
            <table>
                <tr>
                    <td style="text-align:center; font-size:9.8px;"><b>PT Cashlez Worldwide Indonesia Tbk</b></td>
                    <td style="text-align:center; font-size:9.8px;"><b>Pemilik Merchant/ Pejabat Berwenang Badan Usaha</b></td>
                </tr>
            
                <tr>
            
                <td height="40"></td>
                @if(!empty($data->signature->file))
                    <td style="text-align:center"><img src="{{ url('protected/storage/tanda_tangan/'.$data->signature->file) }}" width="80" height="50"/></td>
                @else
                    <td style="text-align:center"></td>
                @endif
                </tr>
            
                <tr>
                    <td style="text-align:center; text-decoration: overline; font-size:9.8px;">Nama Lengkap & Tanda Tangan</td>
            
                    <td style="text-align:center; text-decoration: overline; font-size:9.8px;">Nama Lengkap & Tanda Tangan</td>
                </tr>
            </table>
    
        </div>
    </div>
<div>
    
<script>
    window.print();
</script>