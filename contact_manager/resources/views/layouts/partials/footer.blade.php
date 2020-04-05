<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
{{--<script src="{{ asset('js/jquery.min.js') }}"></script>--}}

<!-- Include all compiled plugins (below), or include individual files as needed -->
{{--<script src="{{ asset('js/jquery.min.js') }}"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script src="{{ asset('js/jasny-bootstrap.min.js') }}"></script>
<script src="{{ asset('jquery-ui/jquery-ui.min.js') }}"></script>

<script>
    $(function () {
        $("input[name=term]").autocomplete({
            source: "{{ route('contacts.autocomplete') }}",
            minLength: 3,
            select: function (event, ui) {
                $(this).val(ui.item.value);
            }
        });
    });
</script>

@yield('form-script')

</body>
</html>