<!-- resources/views/components/header.blade.php -->
<header class="header">
    <div class="header-icons">
        <a href="#" class="header-icon"><i class="mdi mdi-phone"></i></a>
        <a href="#" class="header-icon"><i class="mdi mdi-magnify"></i></a>
        <a href="#" class="header-icon"><i class="mdi mdi-earth"></i></a>
    </div>
    <div>
        <a href="#" id="toggleCurrency" class="header-link">USD</a>
        <a href="#" class="header-icon"><i class="mdi mdi-account"></i></a>
    </div>
</header>

@section('scripts')
    @parent <!-- Keep existing scripts if any -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get the currency toggle element
            var currencyToggle = document.getElementById('toggleCurrency');

            // Add click event listener to toggle currency
            currencyToggle.addEventListener('click', function () {
                // Toggle the currency text
                if (currencyToggle.innerText === 'USD') {
                    currencyToggle.innerText = 'KSH';
                } else {
                    currencyToggle.innerText = 'USD';
                }
            });
        });
    </script>
@endsection
