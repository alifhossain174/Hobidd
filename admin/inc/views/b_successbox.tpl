<script>
    $(document).ready(function () {literal}{{/literal}
        $('#ajaxLayer').modal('hide');
        if ($("#ajaxLayer").closest('.ui-dialog').is(':visible')) {
            $('#ajaxLayer').dialog('close');
        }

        $('#successBoxMsg').html('{$msg}');
        $('#successBox').show();

        {literal}
        $("#successBox").ready(function () {
            $("#successBox").delay(3000).fadeOut(500, function () {
            });
        });
        {/literal}

        {if $redirect}
        {literal}
        $.ajax({
            url: '{/literal}{$redirect}{literal}',
            beforeSend: function () {
                $('#mainContent').html(spinner);
            },
            success: function (data) {
                $('#mainContent').html(data);
            }
        });
        {/literal}
        {/if}


        {literal}});{/literal}

</script>
