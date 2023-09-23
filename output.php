<button id="btn">Click me</button>
<script>
btn.addEventListener('click', function () {
    var logo = 'logo' + '1';
    window.opener.document.getElementById(logo).value = 'something';
    window.close();
});
</script>