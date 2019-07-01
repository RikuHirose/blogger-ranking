<footer id="footer" class="footer bg-dark text-white" data-background-color="black">
  <div class="container px-4 py-5" id="wrapper">
    <div class="row">
      <div class="col-md-12">

        <div class="row">

          <div class="col-md-8 mb-4">
            <p style="font-size: 16px;">{{ Config::get('app.name') }}</p>
          </div>
          <div class="col-md-4 pb-2">
              <ul class="list-unstyled">
                <li class="mb-4">
                  <a href="/" class="text-white">トップ</a>
                </li>
                <li class="mb-4">
                  <a href="" class="text-white">お問い合わせ</a>
                </li>
                <li class="mb-4">
                  <a href="{{ route('about.privacy') }}" class="text-white">プライバシーポリシー</a>
                </li>
                <li class="mb-4">
                  <a href="{{ route('about.term') }}" class="text-white">利用規約</a>
                </li>
              </ul>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="text-center pb-4">
    <div class="copyright">
      &copy; {{ date("Y") }} Riku Hirose
    </div>
  </div>
</footer>


