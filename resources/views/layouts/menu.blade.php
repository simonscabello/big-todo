<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Route::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('project.index') }}" class="nav-link {{ Route::is('project.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-project-diagram"></i>
        <p>Projects</p>
    </a>
</li>

