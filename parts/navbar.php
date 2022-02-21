<style>
.bg-custom {
   background-color: #283071 ;
}
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-custom">
<div class="container">
  <a class="navbar-brand" href="/">COVID-19 <img src="/img/covid-19-logo.png" srcset="/img/covid-19-logo.svg" height="30"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'active' ?>">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) == 'map.php') echo 'active' ?>">
        <a class="nav-link" href="map">Map</a>
      </li>
      <li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) == 'countries.php') echo 'active' ?>">
        <a class="nav-link" href="countries">Countries</a>
      </li>
      <li class="nav-item dropdown <?php if (basename($_SERVER['PHP_SELF']) == 'stats.php') echo 'active' ?>">
        <a class="nav-link" href="stats">Analytics</a>
      </li>
      <li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) == 'faq.php') echo 'active' ?>">
        <a class="nav-link" href="faq">FAQ</a>
      </li>
      <li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) == 'source.php') echo 'active' ?>">
        <a class="nav-link" href="source">Data Source</a>
      </li>
    </ul>
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Theme
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item theme-link" href="#" data-theme="flatly" class="theme-link">Light</a>
        <a class="dropdown-item theme-link" href="#" data-theme="darkly" class="theme-link">Dark</a>
      </div>
    </div>
  </div>
</nav>

<!-- Change main CSS based on theme dropdown, store choice in cookie -->
<script>
var themes = {
    "flatly" : "//bootswatch.com/4/flatly/bootstrap.min.css",
    "darkly" : "//bootswatch.com/4/darkly/bootstrap.min.css"
}
$(function(){
    function getCookie(c_name) {
        if (document.cookie.length > 0) {
            c_start = document.cookie.indexOf(c_name + "=");
            if (c_start != -1) {
                c_start = c_start + c_name.length + 1;
                c_end = document.cookie.indexOf(";", c_start);
                if (c_end == -1) c_end = document.cookie.length;
                return unescape(document.cookie.substring(c_start, c_end));
            }
        }
        return "default";
    }

    function setCookie(c_name, value) {
        var exdate = new Date();
        exdate.setDate(exdate.getDate() + 7);
        document.cookie = c_name + "=" + escape(value) + ";path=/;expires=" + exdate.toUTCString();
    }

    var setTheme = getCookie('setTheme');

    var themesheet = $('<link href="'+themes[getCookie('setTheme')]+'" rel="stylesheet" />');

    themesheet.appendTo('head');

    $('.theme-link').click(function(){
        var themeurl = themes[$(this).attr('data-theme')];
        setCookie('setTheme', $(this).attr('data-theme'));
        themesheet.attr('href',themeurl);
    });
});
</script>
