@if (Session::has(CommonConstants::ACTION_ERROR))
    <script>
        alert('{{ Session::get(CommonConstants::ACTION_ERROR) }}');
    </script>
@elseif (Session::has(CommonConstants::ACTION_SUCCESS))
    <script>
        alert('{{ Session::get(CommonConstants::ACTION_SUCCESS) }}');
    </script>
@endif
