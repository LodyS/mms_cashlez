<link rel="stylesheet" href="{{ url('css/form-pengajuan-edc.css') }}">

<title>FORM PENGAJUAN SEWA EDC</title>

<body>
    <div class="container">
        <div style="float:left;"><p>FORMULIR PENYEWAAN EDC</p></div>
        <div style="float:right;"><img src="{{ url('logo/logo-hitam.png') }}" width="150"/></div>
    </div>

    <div style="height:50px"></div>

    <table>
        <tr>
            <td style="width:150px"><b>Nomor Formulir</b></td>
            <td>:</td>
        </tr>
    </table>

    <p>Formulir Penyewaan Mesin EDC dibuat dan ditandatangani di Jakarta, pada hari ________, tanggal __ bulan ___ tahun ____, oleh dan antara:</p>

    <table>
        <tr>
            <td style="width:150px"><b>Nama Pemilik Usaha</b></td>
            <td>: {{ $data->nama_pemilik_merchant ?? '' }}</td>
        </tr>

        <tr>
            <td><b>Jabatan</b></td>
            <td>: {{ ($data->nama_pemilik_merchant !== $data->nama_pengurus_merchant) ? 'Pemilik' : 'Pemilik dan pengurus' }}</td>
        </tr>

        <tr>
            <td><b>No. KTP</b></td>
            <td style="width:250px">: {{ ($data->kewarganegaraan == 'WNI') ? $data->nomor_identitas : '' }}</td>
            <td><b>No. PASSPORT/KITAS</b></td>
            <td>: {{ ($data->kewarganegaraan !== 'WNI') ? $data->nomor_identitas : ''}}</td>
        </tr>

        <tr>
            <td><b>Nama Merchant</b></td>
            <td>: {{ $data->nama_merchant ?? '' }}</td>
        </tr>

        <tr>
            <td><b>Alamat Merchant</b></td>
            <td>: {{ $data->alamat_bisnis ?? '' }}</td>
        </tr>

        <tr>
            <td><b>Tipe</b></td>
            <td>:</td>
        </tr>

        <tr>
            <td><b>Jumlah</b></td>
            <td>: {{ $kebutuhan_jumlah_edc ?? '' }}</td>
        </tr>

        <tr>
            <td><b>Nomor Seri</b></td>
            <td>:</td>
        </tr>
    </table>

    <div style="height:5px"></div>

    <i style="font-size:11px">*Data yang dicantumkan diatas wajib sesuai dengan data Merchant yang terdaftar pada Form Aplikasi Pendaftaran Merchant Cashlez.</i>
    <div style="height:5px"></div>
    
    <u>Syarat dan Ketentuan Penyewaan Mesin EDC</u>

    <ol type="1" style="position:relative; right:4%">
        <li>
            <b>Skema Penyewaan Unit</b>
            <table style="width:100%; border:1px" border="1" cellpadding="0" cellspacing="0">
                <tr>
                    <th style="background-color: rgb(202, 219, 243); width:5%">No</th>
                    <th style="background-color: rgb(202, 219, 243); width:15%">Tipe Perangkat</th>
                    <th style="background-color: rgb(202, 219, 243); width:40%">Ties Sales Volume (Per Unit per bulan)</th>
                    <th style="background-color: rgb(202, 219, 243)">Biaya Sewa <br/>(Per unit per bulan)</th>
                    <th style="background-color: rgb(202, 219, 243)">Dana Jaminan (Per Unit)</th>
                </tr>

                <tr>
                    <td style="text-align:center">1</td>
                    <td rowspan="3" style="text-align:center">All in One <br/>C1/P1/P2/ Other Android Version</td>
                    <td style="text-align:center">Rp. 100.000.000</td>
                    <td style="text-align:center">Rp. 225.000</td>
                    <td rowspan="3" style="text-align:center">Rp. 750.000</td>
                </tr>

                <tr>
                    <td style="text-align:center">2.</td>
                    <td style="text-align:center">Rp. 100.000.000 s/d < Rp. 200.000.000</td>
                    <td style="text-align:center">Rp. 125.000</td>
                </tr>

                <tr>
                    <td style="text-align:center">3.</td>
                    <td style="text-align:center">Rp. 200.000.000 s/d > Rp. 200.000.000</td>
                    <td style="text-align:center">Free</td>
                </tr>
            </table>
            
            <div style="height:5px"></div>

            <ol style="position: relative; right:4%">
                <li class="rata_justify">
                    <b>Cashlez</b> menyediakan Mesin EDC kepada <b>Merchant</b> dengan skema penyewaan dengan pembayaran dana jaminan dan perhitungan 
                    biaya sewa akan dihitung dari sales volume transaksi per Mesin EDC
                </li>

                <li class="rata_justify">
                    Ketentuan penyewaan Mesin EDC dan perhitungan biaya sewa sesuai dengan Tier sales volume pada table 1 diatas.
                </li>

                <li class="rata_justify">
                    <b>Merchant</b> dapat melakukan penyewaan dengan Free biaya sewa, apabila Sales Volume atas transaksi yang terjadi
                    setiap bulannya mencapai target Sales Volume yang disebutkan pada tabel 1 poin 3 di atas, tetapi apabila <b>Merchant</b>
                    tidak mencapai Sales Volume tersebut, maka <b>Merchant</b> wajib membayar biaya sewa Mesin EDC yang sudah
                    ditentukan pada tabel 1 poin 1 & 2 di atas, dan dengan demikian <b>Merchant</b> memberikan kuasa kepada <b>Cashlez</b> untuk
                    melakukan pemotongan atas dana jaminan yang berjalan, apabila dana jaminan sudah habis terpotong atau tidak
                    cukup untuk pemotongan dana jaminan, maka <b>Merchant</b> wajib membayarkan biaya sewa melalui transfer ke rekening
                    <b>Cashlez</b> yang akan dikirimkan terpisah melalui email kepada <b>Merchant</b>.
                </li>

                <li class="rata_justify">
                    <b>Merchant</b> wajib untuk membayar dana jaminan sebesar Rp. 750,000 (tujuh ratus lima puluh ribu Rupiah) per Mesin EDC kepada <b>Cashlez</b>.
                </li>

                <li class="rata_justify">
                    Dana jaminan yang akan dikenakan kepada <b>Merchant</b> adalah dana jaminan untuk antisipasi atas biaya sewa atau
                    adanya biaya kerusakan atas pemakaian/ cacat/ hilang yang kemungkinan akan timbul dikemudian hari, pemotongan
                    dana jaminan akan berlaku dengan kondisi sebagai berikut:

                   <table>
                        <tr>
                            <td>a.</td>
                            <td style="text-align:justify">
                                Sales Volume atas transaksi berhasil <b>Merchant</b> tidak sesuai dengan kesepakatan sebagaimana tercantum pada tabel 1 di atas;
                            </td>
                        </tr>

                        <tr>
                            <td>b.</td>
                            <td style="text-align:justify">Adanya kerusakan atas pemakaian / cacat/ hilang selama masa penyewaan.</td>
                        </tr>
                   </table>
                </li>

                <li class="rata_justify">
                    <b>Merchant</b> memberikan kuasa kepada <b>Cashlez</b> untuk melakukan pemotongan dana jaminan sebesar biaya-biaya yang
                    timbul. Apabila dana jaminan tidak mencukupi dari biaya ganti rugi yang timbul, maka <b>Cashlez</b> berhak untuk
                    melakukan pemotongan atas dana transaksi berhasil/ settlement yang berada di <b>Cashlez</b> sebesar biaya kerugian yang
                    timbul, apabila dana jaminan dan dana settlement tidak mencukupi untuk biaya ganti rugi yang dimaksud, maka
                    <b>Merchant</b> tetap wajib membayarkan sisa nilai kerugian dengan transfer ke rekening yang akan dikirimkan melalui
                    email kepada <b>Merchant</b>.
                </li>

                <li class="rata_justify">
                    Apabila dana jaminan sudah habis terpotong oleh biaya sewa karena sales volume transaksi tidak sesuai dengan
                    kesepakatan dan <b>Merchant</b> masih tetap ingin menyewa Mesin EDC, maka <b>Merchant</b> wajib melakukan top up dana
                    jaminan kembali kepada <b>Cashlez</b> sebesar dana yang tercantum pada ayat 2 di atas.
                </li>

                <li class="rata_justify">
                    Pembayaran dana jaminan yaitu ke nomor rekening yang akan dikirimkan terpisah dari form ini, pengecekan
                    pembayaran dana jaminan adalah H+1 setelah transfer dilakukan, pengiriman dana jaminan wajib mencantumkan
                    nama <b>Merchant</b>
                </li>

                <li class="rata_justify">
                    Dana jaminan akan dikembalikan secara penuh apabila tidak ada pemotongan atas biaya sewa dan pengembalian
                    Mesin EDC beserta kelengkapannya yang disewa dikembalikan kepada <b>Cashlez</b> dalam kondisi berfungsi dengan baik
                    tidak ada kerusakan/ cacat/ hilang selama masa penyewaan.
                </li>

                <li class="rata_justify">Dana jaminan akan dikembalikan maksimal H+14 (hari kerja) setelah hasil pengecekan dilakukan oleh <b>Cashlez</b></li>
                
                <li class="rata_justify">Rekening Pengembalian dana jaminan:
                    <table>
                        <tr>
                            <td style="width:150px">Nama Pemilik Rekening</td>
                            <td>: {{ $data->nama_pemilik_rekening_merchant_badan_usaha ?? '' }}</td>
                        </tr>

                        <tr>
                            <td style="width:150px">Nomor Rekening</td>
                            <td>: {{ $data->nomor_rekening_bank_penampung ?? '' }}</td>
                        </tr>

                        <tr>
                            <td style="width:150px">Nama Bank/Cabang</td>
                            <td>: {{ $data->nama_bank ?? '' }}</td>
                        </tr>
                    </table>
                </li>

                <li class="rata_justify"><b>Cashlez</b> akan menerbitkan dokumen berupa Invoice atas tagihan biaya sewa apabila dana jaminan tidak tersedia
                    ataupun tidak mencukupi untuk pembayaran biaya sewa yang timbul yaitu maksimal H+3 dari tanggal 15 (cut off
                    perhitungan internal <b>Cashlez</b>)
                </li>

                <li class="rata_justify">Ketentuan pembayaran biaya sewa wajib dilakukan maksimal H+1 setelah <b>Merchant</b> menerima Invoice yang akan
                    dikirimkan menggunakan soft copy melalui email oleh Tim Finance <b>Cashlez</b>
                </li>

                <li class="rata_justify">
                    <b>Cashlez</b> akan mengirimkan email pengingat pembayaran sewa apabila dalam jangka waktu yang ditentukan di atas belum ada pembayaran dari 
                    <b>Merchant</b>.
                </li>

                <li class="rata_justify">
                    <b>Merchant</b> wajib membayar biaya sewa yang timbul sesuai dengan jangka waktu yang telah ditentukan.
                </li>
                
                <li class="rata_justify">
                    Dalam hal tidak adanya pembayaran atas biaya sewa yang ditagihkan maka <b>Merchant</b> wajib untuk mengembalikan
                    Mesin EDC yang disewa kepada <b>Cashlez</b> ke alamat kantor <b>Cashlez</b>/ Tim Sales <b>Cashlez</b>
                </li>

                <li class="rata_justify">Biaya sewa Mesin EDC yang tertera di atas belum termasuk pajak.</li>
                
                <li class="rata_justify">
                    Penagihan biaya sewa akan tetap berjalan yang disesuaikan dengan berlakunya masa sewa antara  <b>Cashlez</b> dengan <b>Merchant</b>.
                </li>
            </ol>
        </li>

        <div style="page-break-before: always"></div>
        
        <li class="rata_justify"><b><b>Merchant</b> Discout Rate (MDR)</b><br/>
            Biaya MDR (<b>Merchant</b> Discount Rate) akan dibebankan kepada <b>Merchant</b> atas transaksi yang dilakukan oleh Pelanggan
            terkait dengan transaksi yang dilakukan dengan mempergunakan produk dan layanan <b>Cashlez</b>, atas penggunaan layanan
            pembayaran Kartu Kredit dan/atau Kartu Debit maupun layanan pembayaran digital lainnya atas transaksi berhasil adalah
            sebagai berikut:

            <div style="height:5px"></div>

            <span style="display:inline-block;width:150px;">2.1 Credit Card On Us</span><span>:1.8%</span>
            <div style="height:2px"></div>   
            <span style="display:inline-block; width:150px;">2.2 Credit Card Off Us</span><span>: 2%</span>
            
            <p style="position:relative; left:2%">
                *Untuk MDR lengkap dapat di akses: <a href="https://www.<b>Cashlez</b>.com/pricing.html">https://www.<b>Cashlez</b>.com/pricing.html</a><br/>
                *Biaya MDR belum termasuk PPN 11%.
            </p>
        </li>

        <div style="height:5px"></div>

        <li class="rata_justify">
            <b>Mesin EDC</b> <br/>
            <ol style="position: relative; right:4%">
                <li class="rata_justify">Mesin EDC beserta kelengkapannya adalah milik <b>Cashlez</b> dimana <b>Cashlez</b> akan menyediakan Mesin EDC beserta
                    kelengkapannya dengan jumlah sesuai dengan kebutuhan dan permintaan dari <b>Merchant</b> atas persetujuan dari
                    <b>Cashlez</b> yang disampaikan secara tertulis dengan biaya-biaya sesuai kesepakatan Para Pihak.
                </li>

                <li class="rata_justify">Mesin EDC wajib dikembalikan dalam kondisi layak pakai, atau ada penilaian ulang perihal harga Mesin EDC dan
                    <b>Cashlez</b> berhak untuk melakukan penilaian ulang terhadap harga Mesin EDC yang dikembalikan oleh <b>Merchant</b>,
                    mengikuti kelayakan dan kondisi Mesin EDC. Apabila Mesin EDC mengalami kerusakan/ hilang/ cacat <b>Merchant</b> wajib
                    membayar biaya ganti rugi sesuai dengan harga yang tertera pada Ayat 3.10.
                </li>

                <li class="rata_justify">Penempatan Mesin EDC pada <b>Merchant</b> wajib sesuai lokasi/alamat yang terdaftar pada <b>Cashlez</b></li>
                    
                <li class="rata_justify">
                    Masa garansi Mesin EDC adalah sesuai dengan periode masa penyewaan, <b>Merchant</b> wajib menginformasikan kepada
                    <b>Cashlez</b> mengenai rincian kerusakan dan <b>Cashlez</b> telah melakukan pengecekan mengenai kerusakan yang terjadi
                    namun disesuaikan dengan ketersediaan stok <b>Cashlez</b>.
                </li>

                <li class="rata_justify">
                    <b>Cashlez</b> wajib menyediakan Mesin EDC pengganti apabila mengalami kerusakan software dan/atau kerusakan
                    pabrikasi yang dapat menyebabkan Mesin EDC tidak berfungsi dan/atau tidak dapat digunakan oleh <b>Merchant</b>,
                    Pengajuan klaim garansi harus mengikuti ketentuan sebagai berikut:
                    
                    <table>
                        <tr>
                            <td>a.</td>
                            <td>Nomor seri pada Mesin EDC masih bisa terbaca dengan jelas.</td>
                        </tr>

                        <tr>
                            <td>b.</td>
                            <td>Kondisi kelengkapan Mesin EDC harus lengkap (dus, kabel charger, mika box, dan adapter charger).</td>
                        </tr>

                        <tr>
                            <td>c.</td>
                            <td>Klaim garansi Mesin EDC hanya berlaku untuk 1 (satu) kali klaim. </td>
                        </tr>

                        <tr>
                            <td>d.</td>
                            <td>Mesin EDC yang ingin diklaim harus dalam keadaan masih tersegel pada stiker segel.</td>
                        </tr>

                        <tr>
                            <td>e.</td>
                            <td><b>Cashlez</b> akan melakukan pengecekan terhadap Mesin EDC yang ingin diajukan klaim garansi oleh <b>Merchant</b></td>
                        </tr>

                        <tr>
                            <td>f.</td>
                            <td>Pergantian Mesin EDC disesuaikan dengan kondisi kerusakan dan telah melalui tahapan pengecekan di <b>Cashlez</b>. </td>
                        </tr>

                        <tr>
                            <td>g.</td>
                            <td>Segala hasil pengecekan pada <b>Cashlez</b> bersifat mutlak dan <b>Cashlez</b> dibebaskan dari segala bentuk 
                                tanggung jawab dan kerugian.
                            </td>
                        </tr>

                        <tr>
                            <td>h.</td>
                            <td>SLA pengecekan Mesin EDC adalah 7 (tujuh) hari kerja terhitung dari Mesin EDC diterima oleh <b>Cashlez</b>.</td>
                        </tr>
                    </table>
                </li>

                <li class="rata_justify">Mesin EDC yang dikirimkan kepada <b>Merchant</b> telah melalui tahap pengecekan dan testing transaksi.</li>
                    
                <li class="rata_justify">
                    Pengiriman dan/ atau pemasangan Mesin EDC akan dilakukan maksimal H+3 setelah <b>Merchant</b> lolos verifikasi bank,
                    sudah melakukan pembayaran dana jaminan dimana dana sudah masuk ke rekening <b>Cashlez</b>.
                </li>

                <li class="rata_justify">
                    Pengiriman mesin EDC dapat dilakukan oleh tim Sales <b>Cashlez</b>/ Vendor Ekspedisi/ Vendor pemasangan 
                    yang ditunjuk resmi oleh <b>Cashlez</b>.
                </li>
                    
                <li class="rata_justify"> 
                    Pengiriman Mesin EDC yang dilakukan melalui jasa Vendor <b>Cashlez</b> dan/ atau Vendor Ekspedisi akan menyesuaikan dengan 
                    ketentuan pengiriman masing-masing jasa Vendor.
                </li>

                <li class="rata_justify">Nomor seri dan jumlah yang tertera adalah nomor seri yang diberikan kepada <b>Merchant</b> pada saat awal pengajuan
                    penyewaan Mesin EDC, nomor seri dan jumlah tersebut sewaktu-waktu dapat berubah disesuaikan dengan kondisi
                    Mesin EDC dan/ atau permintaan penambahan Mesin EDC, apabila terjadi kendala pada Mesin EDC dikemudian hari
                    memungkinkan <b>Cashlez</b> melakukan pergantian Mesin EDC dan tidak dicantumkan kembali pada perjanjian ini, namun
                    tetap mengikat pada perjanjian ini.
                </li>
                    
                <li class="rata_justify">
                    Penggunaan 1 (satu) Mesin EDC hanya diperbolehkan untuk 1 (satu) <b>Merchant</b> sesuai dengan bidang usaha <b>Merchant</b> 
                    yang didaftarkan kepada <b>Cashlez</b>.
                </li>

                <li class="rata_justify"><b>Merchant</b> wajib menanggung biaya-biaya yang timbul dalam pengiriman penyewaan dan klaim garansi Mesin EDC. </li>

                <li class="rata_justify">Ketentuan biaya ganti rugi apabila terdapat kerusakan/ hilang/ cacat pada Perangkat maupun kelengkapannya sebagai berikut:
                    <table>
                        <tr>
                            <td>a.</td>
                            <td style="width:120px">P2/ Android</td>
                            <td>: Rp. 4.440.000 (empat juta empat ratus empat puluh empat ribu Rupiah) per perangkat</td>
                        </tr>

                        <tr>
                            <td>b.</td>
                            <td>Power Adapter</td>
                            <td>: Rp. 136,400 (seratus tiga puluh enam ribu empat ratus Rupiah) per sparepart</td>
                        </tr>

                        <tr>
                            <td>c.</td>
                            <td>USB Cable</td>
                            <td>: Rp. 83.700 (delapan puluh tiga ribu tujuh ratus Rupiah) per sparepart</td>
                        </tr>

                        <tr>
                            <td>d.</td>
                            <td>Box</td>
                            <td>: Rp. 50.000 (lima puluh ribu Rupiah) per <i>box</i></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td colspan="2">*Biaya kerusakan lainnya (apabila ada) yang kemungkinan akan timbul pada kemudian hari akan menyesuaikan dengan hasil pengecekan kerusakan yang timbul</td>
                        </tr>
                    </table>
                </li>
            </ol>
        </li>

        <li class="rata_justify">
            <b>Periode Penyewaan Mesin EDC</b>
            <ol style="position: relative; right:4%">
                <li>Jangka waktu penyewaan ini 1 (satu) tahun terhitung sejak ditandatanganinya formulir penyewaan mesin EDC</li>
                <li class="rata_justify">Jangka waktu penyewaan dapat diperpanjang berdasarkan kesepakatan dari Para Pihak yang harus dibuat paling
                    lambat 30 (tiga puluh) hari kalender sebelum jangka waktu berakhir dengan syarat dan ketentuan yang akan
                    didiskusikan dan disepakati kemudian oleh Para Pihak, apabila saat berakhirnya jangka waktu tidak dilakukan
                    perpanjangan antara Para Pihak, maka pengajuan ini akan berakhir secara otomatis
                </li>
            </ol>
        </li>
    </ol>

    <p class="rata_justify">
        Form pengajuan penyewaan mesin EDC ini, beserta seluruh lampiran dan/ atau dokumen lainnya yang timbul atas Kerjasama
        dengan Merchant adalah merupakan satu kesatuan dengan Perjanjian yang tertera pada formulir regsitrasi Merchant.
    </p>

    <p class="rata_justify">
        Dengan ditandatanganinya formulir ini, Merchant menyatakan telah mengerti dan menyetujui seluruh ketentuan dan dengan ini
        membebaskan Cashlez dari segala tuntutan dan kerugian yang timbul mengenai pelaksanaan penyewaan ini.
    </p>

    <table>
        <tr>
            <td style="text-align:center">PT Cashlez Worldwide Indonesia Tbk</td>
            <td style="width:200px"></td>
            <td style="text-align:center">Pemilik Usaha/ Pejabat Berwenang Badan Usaha</td>
        </tr>

        <tr>
            <td height="40"></td>
            <td></td>
            <td style="text-align:center"><img src="{{ url('protected/storage/tanda_tangan/'.$tanda_tangan) }}" width="80" height="50"/></td>
        </tr>

        <tr>
            <td style="text-align:center">(_________________________)<br/>Tanda tangan dan nama jelas</td>
            <td></td>
            <td style="text-align:center">(_________________________)<br/>Tanda tangan dan nama jelas</td>
        </tr>
    </table>
</body>
