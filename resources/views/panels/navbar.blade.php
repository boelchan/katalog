@if($configData["mainLayoutType"] === 'horizontal' && isset($configData["mainLayoutType"]))
<nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center {{ $configData['navbarColor'] }}" data-nav="brand-center">
  <div class="navbar-header d-xl-block d-none">
    <ul class="nav navbar-nav">
      <li class="nav-item">
        <a class="navbar-brand" href="{{url('/')}}">
          <span class="brand-logo">
            <img src="{{ asset('images/logo/logo.jpeg') }}"  height="60px" alt="">
          </span>
        </a>
      </li>
    </ul>
  </div>
  @else
  <nav class="header-navbar navbar navbar-expand-lg align-items-center {{ $configData['navbarClass'] }} navbar-light navbar-shadow {{ $configData['navbarColor'] }} ">
    @endif
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
          <ul class="nav navbar-nav d-xl-none">
            <li class="">
              <a class="mb-0 font-weight-bold brand-text-min" href="{{url('/')}}">
                <span class="brand-logo">
                  <img src="{{ asset('images/logo/logo.jpeg') }}"  height="60px" alt="">
                </span>
              </a>
            </li>
          </ul>
        </div>
      </ul>
    </div>
  </nav>
