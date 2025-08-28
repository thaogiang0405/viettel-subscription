<style>
/* Khi rê chuột vào menu hoặc click giữ chuột */
.sidebar .list li a:hover,
.sidebar .list li a:focus {
    color: #EE0033 !important;
}

/* Icon cũng đổi sang đỏ khi hover */
.sidebar .list li a:hover i,
.sidebar .list li a:focus i {
    color: #EE0033 !important;
}

/* Chữ và icon màu trắng khi đang active */
.sidebar .list li.active > a,
.sidebar .list li.active > a i {
    color: #fff !important;
}

</style>
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="#"><img src="/images/viettel-logo.png" width="100px" alt="Aero"><span class="m-l-10"></span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="profile.html"><img src="assets/images/profile_av.jpg" alt="User"></a>
                    <div class="detail">
                        <h4>{{ $user->name }}</h4>
                        <small>{{ ucfirst($user->role) }}</small>                     
                    </div>
                </div>
            </li>
            <li ><a href="{{route('admin.dashboard')}}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>Projects</span></a>
                <ul class="ml-menu">
                    <li><a href="{{ route('list_goi_cuoc') }}">Projects List</a></li>
                    
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-shopping-cart"></i><span>DS đăng ký trả trước</span></a>
                <ul class="ml-menu">
                    <li><a href="{{route('ds_tra_truoc_co_sim')}}">Gồm sim</a></li>
                    <li><a href="{{route('ds_tra_truoc_khong_sim')}}">Không sim</a></li>
                </ul>
            </li>
             <li ><a href="{{route('ds_tra_sau')}}"><i class="zmdi zmdi-home"></i><span>DS đăng ký  trả sau</span></a></li>
            
           
        </ul>
    </div>
</aside>
