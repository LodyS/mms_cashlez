<style>
.insight-label {
    display: inline-block;
    min-width: 145px;
}
</style>
    
    <div class="sidebar-body" style="background-color:#1b1742;" class="hilang_gap">
        <ul class="nav">
            <li class="nav-item nav-category" style="color:#fffffff9;">MENU ADMIN</li>
                
                <?php $id_privilege = array(24, 27, 37)?>

                @if(in_array(Auth::user()->privilege_user_id, $id_privilege))
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#merchant" role="button" aria-expanded="false" aria-controls="status_data_merchant">
                        <i class="link-icon" data-feather="list" style="color:#fffffff9;"></i><span class="link-title" style="color:#fffffff9;">Status Permohonan</span>
                        <i class="link-arrow" data-feather="chevron-down" style="color:#fffffff9;"></i>
                    </a>

                    <div class="collapse" id="merchant">
                        <ul class="nav sub-menu" style="color:#fffffff9;">
                
                            <li  style="color:#fffffff9;">
                                <a href="{{ url('status-permohonan', ['New Request']) }}" class="nav-link">
                                    <span class="insight-label" style="font-size:12px; color:#fffffff9;">New Request</span>
                                    <span class="badge badge-pill badge-light" style="color:#17c33cf9"><b>{{ \App\Models\DataMerchant::jumlah_data_berdasarkan_status('New Request') }}</b></span>
                                </a>
                            </li>

                            <li  style="color:#fffffff9;">
                                <a href="{{ url('status-permohonan', ['Process']) }}" class="nav-link">
                                    <span class="insight-label" style="color:#fffffff9;">Process</span>
                                    <span class="badge badge-pill  badge-light" style="color:#727cf5">{{ \App\Models\DataMerchant::jumlah_data_berdasarkan_status('Process') }}</span>
                                </a>
                            </li>

                            <li  style="color:#fffffff9;">
                                <a href="{{ url('status-permohonan', ['Updated']) }}" class="nav-link">
                                    <span class="insight-label" style="color:#fffffff9;">Update</span>
                                    <span class="badge badge-pill badge-light" style="color:rgb(255, 149, 0)">{{ \App\Models\DataMerchant::jumlah_data_berdasarkan_status('Updated') }}</span>
                                </a>
                            </li>

                            <li  style="color:#fffffff9;">
                                <a href="{{ url('status-permohonan', ['Approved']) }}" class="nav-link">
                                    <span class="insight-label" style="color:#fffffff9;">Approved</span>
                                    <span class="badge badge-pill badge-light" style="color:rgb(0, 133, 250)">{{ \App\Models\DataMerchant::jumlah_data_berdasarkan_status('Approved') }}</span>
                                </a>
                            </li>

                            <li  style="color:#fffffff9;">
                                <a href="{{ url('status-permohonan', ['Rejected']) }}" class="nav-link">
                                    <span class="insight-label" style="color:#fffffff9;">Rejected</span>
                                    <span class="badge badge-pill  badge-light" style="color:rgb(241, 104, 102)">{{ \App\Models\DataMerchant::jumlah_data_berdasarkan_status('Rejected') }}</span>
                                </a>
                            </li>

                            <li style="color:#fffffff9;">
                                <a href="{{ url('status-permohonan', ['Close']) }}" class="nav-link">
                                    <span class="insight-label" style="color:#fffffff9;">Close</span>
                                    <span class="badge badge-pill  badge-light" style="color:rgb(255, 16, 16)">{{ \App\Models\DataMerchant::jumlah_data_berdasarkan_status('Close') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif
    
                @if(in_array(Auth::user()->privilege_user_id, $id_privilege))
    
                    <?php $token_applicant = $token_applicant ?? ''; ?>
                  
                    <?php $url = array(
                        url('proses-persetujuan-mo', $token_applicant),
                        url('persetujuan-fitur-pembayaran', $token_applicant), 
                        url('status-merchant', ['Process', $token_applicant]),
                        url('status-merchant', ['Approved', $token_applicant]),
                        url('status-merchant', ['Close', $token_applicant]),
                        url('status-merchant', ['New Request', $token_applicant]),
                        url('pra-status-merchant', ['Updated', $token_applicant]),
                        url('status-merchant', ['Rejected', $token_applicant]),
                        url('status-approval-detail', $token_applicant),
                        url('bank-approve', $token_applicant),
                        url('proses-risk-analyst', $token_applicant)
                    ); ?>
    
                    @if(in_array(URL::current(), $url))
                        <?php $token_applicant = $data['data']->token_applicant ?? $token_applicant; ?>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#status_merchant" role="button" aria-expanded="false" aria-controls="status_data_merchant">
                                <i class="link-icon" data-feather="filter" style="color:#fffffff9;"></i><span class="link-title" style="color:#fffffff9;">Status Fitur Pembayaran</span>
                                <i class="link-arrow" data-feather="chevron-down" style="color:#fffffff9;"></i>
                            </a>
    
                            <div class="collapse" id="status_merchant">
                                <ul class="nav sub-menu" style="color:#fffffff9;">
                        
                                    <li  style="color:#fffffff9;">
                                        <a href="{{ url('status-merchant', ['New Request', $token_applicant]) }}" class="nav-link">
                                            <span class="insight-label" style="font-size:12px; color:#fffffff9;">New Request</span>
                                            <span class="badge badge-pill badge-light" style="color:#17c33cf9"><b>{{ \App\Models\Workflow::jumlah_data_berdasarkan_status('New Request', $token_applicant) }}</b></span>
                                        </a>
                                    </li>
    
                                    <li  style="color:#fffffff9;">
                                        <a href="{{ url('status-merchant', ['Process', $token_applicant]) }}" class="nav-link">
                                            <span class="insight-label" style="color:#fffffff9;">Process</span>
                                            <span class="badge badge-pill  badge-light" style="color:#727cf5">{{ \App\Models\Workflow::jumlah_data_berdasarkan_status('Process', $token_applicant) }}</span>
                                        </a>
                                    </li>
    
                                    {{--<li  style="color:#fffffff9;">
                                        <a href="{{ url('pra-status-merchant', ['Updated', $token_applicant]) }}" class="nav-link">
                                            <span class="insight-label" style="color:#fffffff9;">Update</span>
                                            <span class="badge badge-pill badge-light" style="color:rgb(255, 149, 0)">{{ \App\Models\DataMerchant::jumlah_data_berdasarkan_status('Updated', $token_applicant) }}</span>
                                        </a>
                                    </li>--}}
    
                                    <li  style="color:#fffffff9;">
                                        <a href="{{ url('status-merchant', ['Approved', $token_applicant]) }}" class="nav-link">
                                            <span class="insight-label" style="color:#fffffff9;">Approved</span>
                                            <span class="badge badge-pill badge-light" style="color:rgb(0, 133, 250)">{{ \App\Models\Workflow::jumlah_data_berdasarkan_status('Approved', $token_applicant) }}</span>
                                        </a>
                                    </li>
    
                                    <li  style="color:#fffffff9;">
                                        <a href="{{ url('status-merchant', ['Rejected', $token_applicant]) }}" class="nav-link">
                                            <span class="insight-label" style="color:#fffffff9;">Rejected</span>
                                            <span class="badge badge-pill  badge-light" style="color:rgb(241, 104, 102)">{{ \App\Models\Workflow::jumlah_data_berdasarkan_status('Rejected', $token_applicant) }}</span>
                                        </a>
                                    </li>
    
                                    <li style="color:#fffffff9;">
                                        <a href="{{ url('status-merchant', ['Close', $token_applicant]) }}" class="nav-link">
                                            <span class="insight-label" style="color:#fffffff9;">Close</span>
                                            <span class="badge badge-pill  badge-light" style="color:rgb(255, 16, 16)">{{ \App\Models\Workflow::jumlah_data_berdasarkan_status('Close', $token_applicant) }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif
                @endif
    
                @if(Auth::user()->privilege_user_id == 0)
    
                    <li class="nav-item">
                        <a href="{{ route('privilege-user.index') }}" class="nav-link">
                            <i class="link-icon" data-feather="unlock" style="color:#fffffff9;"></i>
                            <span class="link-title" style="color:#fffffff9;">Privilege User</span>
                        </a>
                    </li>
    
                    <li class="nav-item">
                        <a href="{{ route('region.index') }}" class="nav-link">
                            <i class="link-icon" data-feather="map-pin" style="color:#fffffff9;"></i>
                            <span class="link-title" style="color:#fffffff9;">Region</span>
                        </a>
                    </li>
    
    
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">
                            <i class="link-icon" data-feather="user" style="color:#fffffff9;"></i>
                            <span class="link-title" style="color:#fffffff9;">Users</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="{{ route('bank.index') }}" class="nav-link">
                            <i class="link-icon" data-feather="list" style="color:#fffffff9;"></i>
                            <span class="link-title" style="color:#fffffff9;">Daftar Bank</span>
                        </a>
                    </li>
    
                    <li class="nav-item">
                        <a href="{{ route('dokumen-applicant.index') }}" class="nav-link">
                            <i class="link-icon" data-feather="file" style="color:#fffffff9;"></i>
                            <span class="link-title" style="color:#fffffff9;">Dokumen Applicant</span>
                        </a>
                    </li>
    
                    <li class="nav-item">
                        <a href="{{ route('kategori.index') }}" class="nav-link">
                            <i class="link-icon" data-feather="credit-card" style="color:#fffffff9;"></i>
                            <span class="link-title" style="color:#fffffff9;">Kategori</span>
                        </a>
                    </li>
    
                    <li class="nav-item">
                        <a href="{{ route('product-type.index') }}" class="nav-link">
                            <i class="link-icon" data-feather="grid" style="color:#fffffff9;"></i>
                            <span class="link-title" style="color:#fffffff9;">Tipe Produk</span>
                        </a>
                    </li>
    
                    <li class="nav-item">
                        <a href="{{ route('banner.index') }}" class="nav-link">
                            <i class="link-icon" data-feather="image" style="color:#fffffff9;"></i>
                            <span class="link-title" style="color:#fffffff9;">Banner</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('alasan.index') }}" class="nav-link">
                            <i class="link-icon" data-feather="alert-triangle" style="color:#fffffff9;"></i>
                            <span class="link-title" style="color:#fffffff9;">Alasan</span>
                        </a>
                    </li>
                @endif
    
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="{{ route('logout') }}" role="button" aria-controls="logout" aria-expanded="false"
                    aria-controls="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="link-icon" data-feather="log-out" style="color:#fffffff9;"></i><span class="link-title" style="color:#fffffff9;">Log Out</span>
    
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    