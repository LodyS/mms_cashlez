<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                
                @if($data['data']->pengajuan_sebagai == 'Perorangan')
                    <table class="table table">
                        <tr>
                            <th colspan="2" style="text-align:left"><b>DATA PEMILIK USAHA</b></th>
                        </tr>

                        <tr>
                            <td>Nama Pemilik Merchant</td>
                            <td width="75%">{{ $data['data']->nama_pemilik_merchant ?? '' }}</td>
                        </tr>

                        <tr>
                            <td>Jenis Kelamin</td>
                            <td width="75%">{{ $data['data']->jenis_kelamin_pemilik ?? '' }}</td>
                        </tr>

                        <tr>
                            <td>Tempat Lahir</td>
                            <td width="75%">{{ $data['data']->tempat_lahir ?? '' }}</td>
                        </tr>

                        <tr>
                            <td>Tanggal Lahir</td>
                            <td width="75%">{{  date('d-m-Y', strtotime($data['data']->tanggal_lahir)) }}</td>
                        </tr>

                        <tr>
                            <td>Alamat Sesuai KTP</td>
                            <td width="75%"><textarea class="form-control" readonly rows="4" style="width:700px; background-color:white">{{ $data['data']->alamat_sesuai_ktp ?? '' }}</textarea></td>
                        </tr>

                        <tr>
                            <td>Alamat Domisili Saat Ini</td>
                            <td width="75%"><textarea class="form-control" readonly rows="4" style="width:700px; background-color:white">{{ $data['data']->alamat_domisili ?? '' }}</textarea></td>
                        </tr>

                        <tr>
                            <td>Kewarganegaraan</td>
                            <td width="75%">{{ $data['data']->kewarganegaraan ?? '' }}</td>
                        </tr>

                        <tr>
                            <td>E-mail</td>
                            <td width="75%">{{ $data['data']->email ?? '' }}</td>
                        </tr>

                        <tr>
                            <td>Nomor Identitas</td>
                            <td width="75%">{{ $data['data']->nomor_identitas ?? '' }}</td>
                        </tr>

                        <tr>
                            <td>Nomor HP</td>
                            <td width="75%">{{ $data['data']->nomor_hp ?? '' }}</td>
                        </tr>

                        <tr>
                            <td>NPWP</td>
                            <td width="75%">{{ $data['data']->npwp ?? '' }}</td>
                        </tr>
                    </table>
                @else
                    <table class="table table">
                        <tr>
                            <th colspan="2" style="text-align:left"><b>DATA PEJABAT BERWENANG</b></th>
                        </tr>

                        <tr>
                            <td>Nama Pengurus Merchant</td>
                            <td width="75%">{{ $data['data']->nama_pengurus_merchant ?? '' }}</td>
                        </tr>

                        <tr>
                            <td>Jenis Kelamin</td>
                            <td width="75%">{{ $data['data']->jenis_kelamin_pengurus ?? '' }}</td>
                        </tr>

                        <tr>
                            <td>Alamat</td>
                            <td width="75%">{{ $data['data']->alamat_pejabat_berwenang ?? '' }}</td>
                        </tr>

                        <tr>
                            <td>Kewarganegaraan</td>
                            <td width="75%">{{ $data['data']->kewarganegaraan_pengurus ?? '' }}</td>
                        </tr>

                        <tr>
                            <td>Nomor Identitas</td>
                            <td width="75%">{{ $data['data']->nomor_identitas_pengurus ?? '' }}</td>
                        </tr>

                        <tr>
                            <td>E-mail</td>
                            <td width="75%">{{ $data['data']->email_pengurus ?? '' }}</td>
                        </tr>

                        <tr>
                            <td>Nomor Handphone</td>
                            <td width="75%">{{ $data['data']->nomor_hp_pengurus ?? '' }}</td>
                        </tr>
                    </table>
                @endif

                <div style="height:30px"></div>

                <table class="table table">
                    <tr>
                        <th colspan="2" style="text-align:left"><b>DATA MERCHANT</b></th>
                    </tr>

                    <tr>
                        <td>Nama Merchant</td>
                        <td width="75%">{{ $data['data']->nama_merchant ?? '' }}</td>
                    </tr>

                    <tr>
                        <td>Pengajuan Sebagai</td>
                        <td width="75%">{{ $data['data']->pengajuan_sebagai ?? '' }}</td>
                    </tr>

                    <tr>
                        <td>Tahun Berdiri</td>
                        <td width="75%">{{ $data['data']->tahun_berdiri ?? '' }}</td>
                    </tr>
                
                    <tr>
                        <td>Tipe Usaha</td>
                        <td width="75%">{{ $data['data']->jenis_usaha ?? '' }}</td>
                    </tr>

                    <tr>
                        <td>Jenis Usaha</td>
                        <td width="75%">{{ $data['data']->mcc ?? '' }}</td>
                    </tr>

                    <?php
                    $fitur_transaksi_array = explode(',', $data['data']->fitur_transaksi);
                    $fitur_transaksi_array = array_map("ltrim", $fitur_transaksi_array);
                    ?>
                    <tr>
                        <td valign="top">Fitur Pembayaran</td>
                        <td width="75%">
                            
                            @foreach ($fitur_transaksi_array as $key=> $payment)
                                - {{ $payment }}<br/>
                            @endforeach
                        
                        </td>
                    </tr>

                    <tr>
                        <td>E-mail Usaha</td>
                        <td width="75%">{{ $data['data']->bisnis_email ?? '' }}</td>
                    </tr>

                    <tr>
                        <td>No Telp Usaha</td>
                        <td width="75%">{{ $data['data']->bisnis_no_hp ?? '' }}</td>
                    </tr>

                    <tr>
                        <td>Alamat Usaha</td>
                        <td width="75%"><textarea class="form-control" readonly rows="4" style="width:700px; background-color:white">{{ $data['data']->alamat_bisnis ?? '' }}</textarea></td>
                    </tr>

                    <tr>
                        <td>Jenis Tempat Usaha</td>
                        <td width="75%"><textarea class="form-control" readonly rows="4" style="width:700px; background-color:white">{{ $data['data']->alamat_bisnis ?? '' }}</textarea></td>
                    </tr>

                    <tr>
                        <td>NPWP</td>
                        <td width="75%">{{ $data['data']->npwp_merchant_badan_usaha ?? '' }}</td>
                    </tr>

                    <tr>
                        <td>Store URL</td>
                        <td width="75%">{{ $data['data']->store_url ?? '' }}</td>
                    </tr>

                    <tr>
                        <td>Status Tempat Usaha</td>
                        <td width="75%">{{ $data['data']->status_tempat_usaha ?? '' }}</td>
                    </tr>

                    <tr>
                        <td>Omset Per Bulan</td>
                        <td width="75%">Rp. {{ number_format((float)$data['data']->omset_rata_rata ?? '') }}</td>
                    </tr>

                    <tr>
                        <td>Sumber Data</td>
                        <td width="75%">{{ $data['data']->sumber_data ?? '' }}</td>
                    </tr>
                </table>

                <div style="height:30px"></div>

                <table class="table table">
                    <tr>
                        <th colspan="2" style="text-align:left"><b>DATA BANK</b></th>
                    </tr>

                    <tr>
                        <td>Nama Bank</td>
                        <td width="75%">{{ $data['data']->nama_bank?? '' }}</td>
                    </tr>

                    <tr>
                        <td>Nomor Rekening Bank Penampung </td>
                        <td width="75%">{{ $data['data']->nomor_rekening_bank_penampung ?? '' }}</td>
                    </tr>

                    <tr>
                        <td>Nama Pemilik Rekening Merchant/Badan Usaha</td>
                        <td width="75%">{{ $data['data']->nama_pemilik_rekening_merchant_badan_usaha ?? '' }}</td>
                    </tr>

                    <tr>
                        <td>E-mail Settlement</td>
                        <td width="75%">{{ $data['data']->email_settlement ?? '' }}</td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</div>