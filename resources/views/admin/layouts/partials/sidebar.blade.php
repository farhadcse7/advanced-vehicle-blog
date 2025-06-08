<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link text-center">
        <span class="brand-text font-weight-light">Blog CPanel</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                {{-- Dashboard (show to all) --}}
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                {{-- Category --}}
                @canany(['admin.blog-category.view', 'admin.blog-category.create'])
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Blog Categories
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('admin.blog-category.view')
                                <li class="nav-item">
                                    <a href="{{ route('admin.categories.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Category List</p>
                                    </a>
                                </li>
                            @endcan
                            @can('admin.blog-category.create')
                                <li class="nav-item">
                                    <a href="{{ route('admin.category.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Category</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany

                {{-- Blog --}}
                @canany(['admin.blog-post.view', 'admin.blog-post.create'])
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Blog Posts
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('admin.blog-post.view')
                                <li class="nav-item">
                                    <a href="{{ route('admin.blogs.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Post List</p>
                                    </a>
                                </li>
                            @endcan
                            @can('admin.blog-post.create')
                                <li class="nav-item">
                                    <a href="{{ route('admin.blog.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add New Post</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany

                {{-- Pages --}}
                @canany(['admin.about.edit', 'admin.disclaimer.edit', 'admin.privacy.edit', 'admin.terms.edit'])

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Pages
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('admin.about.edit')
                                <li class="nav-item">
                                    <a href="{{ route('admin.pages.about') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>About Us</p>
                                    </a>
                                </li>
                            @endcan
                            @can('admin.disclaimer.edit')
                                <li class="nav-item">
                                    <a href="{{ route('admin.pages.disclaimer') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Disclarimers</p>
                                    </a>
                                </li>
                            @endcan
                            @can('admin.privacy.edit')
                                <li class="nav-item">
                                    <a href="{{ route('admin.pages.privacy') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Privacy Policy</p>
                                    </a>
                                </li>
                            @endcan
                            @can('admin.terms.edit')
                                <li class="nav-item">
                                    <a href="{{ route('admin.pages.terms') }}" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Terms & Conditions</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany

                {{-- Role & Permissions --}}
                @if (auth()->user()->can('admin.user.view') || auth()->user()->can('admin.users.roles'))
                    {{-- @if (auth()->user()->can('admin.user.view') && auth()->user()->can('admin.users.roles')) --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Role & Permissions
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('admin.user.view')
                                {{-- @can('admin.users.index') --}}
                                <li class="nav-item">
                                    <a href="{{ route('admin.users.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Admins</p>
                                    </a>
                                </li>
                            @endcan
                            @can('admin.users.roles')
                                <li class="nav-item">
                                    <a href="{{ route('admin.users.roles') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Admin Roles</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif
                {{-- Contacts --}}
                @can('admin.contact.index')
                    <li class="nav-item">
                        <a href="{{ route('admin.contact.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-address-book"></i>
                            <p>
                                Contacts
                            </p>
                        </a>
                    </li>
                @endcan
                {{-- Advertisement --}}
                @can('admin.advertisement.view')
                    <li class="nav-item">
                        <a href="{{ route('admin.advertisements.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-bullhorn"></i>
                            <p>
                                Advertisement
                            </p>
                        </a>
                    </li>
                @endcan
                {{-- Web Setting --}}
                @can('admin.settings.edit')
                    <li class="nav-item">
                        <a href="{{ route('admin.settings.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Web Setting
                            </p>
                        </a>
                    </li>
                @endcan
                {{-- logout code  --}}
                <li class="nav-item">
                    <a onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                        href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                {{-- logout code  end --}}
            </ul>
        </nav>
    </div>
</aside>

{{-- logout code from old app.blade.php --}}
{{-- <li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }}
    </a>

    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</li> --}}
