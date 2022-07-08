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
<li class="nav-item">
    <a href="{{ route('team.index') }}" class="nav-link {{ Route::is('team.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-people-arrows"></i>
        <p>Teams</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('task.index') }}" class="nav-link {{ Route::is('task.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tasks"></i>
        <p>Tasks</p>
    </a>
</li>

