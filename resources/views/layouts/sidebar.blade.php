<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                @foreach($Menus as $Menu)
                    @if(count($Menu->SubMenu) > 0)
                    <li class="sidebar-item {{$MainMenu->menu_system_part == $Menu->menu_system_name ? 'selected' : ''}}">
                        <a class="sidebar-link has-arrow waves-effect waves-dark {{$MainMenu->menu_system_part == $Menu->menu_system_name ? 'active' : ''}}" href="javascript:void(0)" aria-expanded="false">
                            <i class="{{$Menu->menu_system_icon}}"></i>
                            @if (strpos($Menu->menu_system_name,'*') !== false)
                                <span class="hide-menu" style="color:red;">{{$Menu->menu_system_name}}</span>
                            @else
                                <span class="hide-menu">{{$Menu->menu_system_name}}</span>
                            @endif
                        </a>
                        <ul aria-expanded="false" class="collapse first-level {{$MainMenu->MainMenu && $MainMenu->MainMenu->menu_system_name == $Menu->menu_system_name ? 'in' : ''}}">
                            @foreach($Menu->SubMenu as $SubMenu)
                                <li class="sidebar-item {{$SubMenu->menu_system_part == $MainMenu->menu_system_part ? 'active' : ''}}">
                                    <a href="{{url('admin/'.$SubMenu->menu_system_part)}}" class="sidebar-link">
                                      <i class="{{$SubMenu->menu_system_icon}}"></i>
                                          @if (strpos($SubMenu->menu_system_name,'*') !== false)
                                              <span class="hide-menu" style="color:red;">{{$SubMenu->menu_system_name}}</span>
                                          @else
                                          <span class="hide-menu">{{$SubMenu->menu_system_name}}</span>
                                      @endif </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    @else
                    <li class="sidebar-item">
                        <a href="{{url('admin/'.$Menu->menu_system_part)}}" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                            <i class="{{$Menu->menu_system_icon}}"></i>
                            @if (strpos($Menu->menu_system_name,'*') !== false)
                            <span class="hide-menu" style="color:red;">{{$Menu->menu_system_name}}</span>
                            @else
                            <span class="hide-menu">{{$Menu->menu_system_name}}</span>
                            @endif
                        </a>
                    </li>
                    @endif
                @endforeach
            </ul>
        </nav>
    </div>
</aside>
