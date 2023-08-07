
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-solid fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Diary</div>
    </a>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Diaries -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('diary.index')}}">
            <i class="fas fa-solid fa-book-open"></i>
            <span>Diaries</span></a>
    </li>

    <!-- Nav Item - Documentations  -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('documentation.index')}}">
            <i class="fas fa-solid fa-images"></i>
            <span>Documentations</span></a>
    </li>
    <!-- Nav Item - ApprovalRequest  -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('approvalrequest.index')}}">
            <i class="fas fa-solid fa-check-double"></i>
            <span>Approval Request</span></a>
    </li>
    <!-- Nav Item - Users  -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.index')}}">
            <i class="fas fa-solid fa-user-secret"></i>
            <span>Users</span></a>
    </li>

</ul>