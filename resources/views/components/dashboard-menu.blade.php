<div>
    <div class="dashboard-menu" wire:ignore>
        <ul class="nav flex-column" role="tablist">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}" wire:navigate><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('account_details') ? 'active' : '' }}" href="{{ route('account_details') }}" wire:navigate><i class="fi-rs-user mr-10"></i>Account Details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('change_password') ? 'active' : '' }}" href="{{ route('change_password') }}" wire:navigate><i class="fi-rs-key mr-10"></i>Change Password</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('delete_account') ? 'active' : '' }}" href="{{ route('delete_account') }}" wire:navigate><i class="fi-rs-trash mr-10"></i>Delete Account</a>
            </li>
            <li class="nav-item">
                <form id="logout-form-two" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a class="nav-link" href="#" onclick="document.getElementById('logout-form-two').submit();"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
            </li>
        </ul>
    </div>
</div>