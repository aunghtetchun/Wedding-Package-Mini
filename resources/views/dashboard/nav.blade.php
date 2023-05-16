@auth
    <div class="aside-left bg-white px-3 pb-2 min-vh-100 shadow">
        <ul class="menu" style="list-style-type: none">
            <li class="brand-icon">
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset(\App\Custom::$info['c-logo']) }}" class="brand-icon-img">
                        <small class="text-primary font-weight-bold h5 mb-0 ml-2">{{ \App\Custom::$info['short_name'] }}</small>
                    </div>
                    <button class="btn btn-light d-block d-lg-none aside-menu-close">
                        <i class="feather-x fa-2x"></i>
                    </button>
                </div>
            </li>
            <li>
                <a class="menu-item mt-3" href="{{ route('home') }}">
                    <span>
                        <i class="feather-home"></i>
                        Dashboard
                    </span>
                </a>
            </li>

            @component('component.nav-spacer') @endcomponent

            @component("component.nav-title") Package Management @endcomponent

            @component("component.nav-item")
                @slot("icon") <i class="feather-plus-circle"></i> @endslot
                @slot("name") Add Package @endslot
                @slot("link") {{ route('wedding_package.create') }} @endslot
            @endcomponent

            @component("component.nav-item-count")
                @slot("icon") <i class="feather-list"></i> @endslot
                @slot("name") Package List @endslot
                @slot("link") {{ route('wedding_package.index') }} @endslot
                @slot("count") {{ \App\WeddingPackage::get()->count() }} @endslot
            @endcomponent
            @component('component.nav-spacer') @endcomponent

            @component("component.nav-title")Blog Management @endcomponent
            @component("component.nav-item")
                @slot("icon") <i class="feather-plus-circle"></i> @endslot
                @slot("name") Category @endslot
                @slot("link") {{ route('category.create') }}@endslot
            @endcomponent
            @component("component.nav-item")
                @slot("icon") <i class="feather-plus-circle"></i> @endslot
                @slot("name") Add Blog @endslot
                @slot("link") {{ route('blog.create') }} @endslot
            @endcomponent

            @component("component.nav-item-count")
                @slot("icon") <i class="feather-list"></i> @endslot
                @slot("name") Blog List @endslot
                @slot("link") {{ route('blog.index') }} @endslot
                @slot("count") {{ \App\Blog::get()->count() }} @endslot
            @endcomponent


            @component('component.nav-spacer') @endcomponent
            @component("component.nav-title") Order Management @endcomponent

            @component("component.nav-item-count")
                @slot("icon") <i class="feather-list"></i> @endslot
                @slot("name") Order @endslot
                @slot("link") {{ route('order.index') }} @endslot
                @slot("count") {{ \App\Order::get()->count() }} @endslot
            @endcomponent
            @component('component.nav-spacer') @endcomponent
            @component("component.nav-title") Recommend Management @endcomponent

            @component("component.nav-item-count")
                @slot("icon") <i class="feather-list"></i> @endslot
                @slot("name") Recommend @endslot
                @slot("link") {{ route('recommend.index') }} @endslot
                @slot("count") {{ \App\Recommend::get()->count() }} @endslot
            @endcomponent



        @component('component.nav-spacer') @endcomponent
            <li>
                <a class="menu-item alert-secondary" onclick="logout()" href="#">
                    <span>
                        <i class="fas fa-lock"></i>
                        Logout
                    </span>
                </a>
            </li>
        </ul>
    </div>


@endauth
