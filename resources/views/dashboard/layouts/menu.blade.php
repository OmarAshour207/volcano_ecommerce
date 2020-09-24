<div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
    <div class="mdk-drawer__content">
        <div class="sidebar sidebar-dark sidebar-left sidebar-p-t bg-dark" data-perfect-scrollbar>
            <div class="sidebar-heading">{{ __('admin.menu') }}</div>
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" data-toggle="collapse" href="#dashboards_menu">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
                        <span class="sidebar-menu-text"> {{ __('admin.dashboard') }} </span>
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    <ul class="sidebar-submenu collapse" id="dashboards_menu">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{ url('admin/dashboard') }}">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left fa fa-chart-bar"></i>
                                <span class="sidebar-menu-text"> {{ __('admin.stat') }} </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="{{ route('slider.index') }}">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                        <span class="sidebar-menu-text"> {{ __('admin.slider') }} </span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="{{ route('services.index') }}">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left  fa fa-briefcase"></i>
                        <span class="sidebar-menu-text">  {{ __('admin.services') }} </span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="{{ route('contacts.index') }}">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left  fa fa-envelope"></i>
                        <span class="sidebar-menu-text">  {{ __('admin.contacts') }} </span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="{{ route('about.index') }}">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left  fa fa-info-circle"></i>
                        <span class="sidebar-menu-text">  {{ __('admin.about') }} </span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="{{ route('testimonials.index') }}">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left  fa fa-check-circle"></i>
                        <span class="sidebar-menu-text">  {{ __('admin.testimonials') }} </span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="{{ route('team-members.index') }}">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left  fa fa-user-friends"></i>
                        <span class="sidebar-menu-text">  {{ __('admin.team_members') }} </span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="{{ route('contactus.index') }}">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left  fa fa-phone"></i>
                        <span class="sidebar-menu-text">  {{ __('admin.contact_us') }} </span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="{{ route('blogs.index') }}">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left  fa fa-book-open"></i>
                        <span class="sidebar-menu-text">  {{ __('admin.blogs') }} </span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="{{ route('categories.index') }}">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left  fa fa-flag"></i>
                        <span class="sidebar-menu-text">  {{ __('admin.categories') }} </span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="{{ route('offers.index') }}">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left  fa fa-flag"></i>
                        <span class="sidebar-menu-text">  {{ __('admin.offers') }} </span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="{{ route('products.index') }}">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left  fa fa-flag"></i>
                        <span class="sidebar-menu-text">  {{ __('admin.products') }} </span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="{{ route('subscribers.index') }}">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left  fa fa-envelope"></i>
                        <span class="sidebar-menu-text">  {{ __('admin.subscribers') }} </span>
                    </a>
                </li>


                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" data-toggle="collapse" href="#dashboards_settings">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
                        <span class="sidebar-menu-text"> {{ __('admin.settings') }} </span>
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    <ul class="sidebar-submenu collapse" id="dashboards_settings">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{ route('settings.contact') }}">
                                <i class="fa fa-phone"></i>
                                <span class="sidebar-menu-text"> {{ __('admin.contact_info') }}</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{ route('settings.seo') }}">
                                <i class="fa fa-rss"></i>
                                <span class="sidebar-menu-text"> {{ __('admin.seo') }}</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{ route('website-settings.index') }}">
                                <i class="fa fa-cog"></i>
                                <span class="sidebar-menu-text"> {{ __('admin.settings_website') }}</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{ route('logos.index') }}">
                                <i class="fa fa-camera"></i>
                                <span class="sidebar-menu-text"> {{ __('admin.logo') }}</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{ route('settings.analytics') }}">
                                <i class="fa fa-chart-area"></i>
                                <span class="sidebar-menu-text"> {{ __('admin.analytics') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>

            <div class="d-flex align-items-center sidebar-p-a border-bottom sidebar-account">
                <a href="{{ route('edit.profile') }}" class="flex d-flex align-items-center text-underline-0 text-body">
                    <span class="avatar avatar-sm mr-2">
                        <img src="{{ auth()->user() ->user_image}}" alt="avatar" class="avatar-img rounded-circle">
                    </span>
                    <span class="flex d-flex flex-column">
                        <strong>{{ auth()->user()->name }}</strong>
                        <small class="text-muted text-uppercase"> {{ __('admin.admin') }} </small>
                    </span>
                </a>
            </div>

        </div>
    </div>
</div>
