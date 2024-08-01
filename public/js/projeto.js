function deleteRegistroPaginacao(rotaUrl, idRegistro) {
    if (confirm('Deseja realmente excluir esse registro?')) {
        $.ajax({
            url: rotaUrl,
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: idRegistro
            },
            beforeSend: function () {
                $.blockUI({
                    message: 'Excluindo...',
                    timeout: 2000
                });
            },
        }).done(function (data) {
            $.unblockUI();
            if (data.success === true) {
                window.location.reload();
            } else {
                alert('Não foi possível excluir o registro');
            }
        }).fail(function (data) {
            $.unblockUI();
            alert('Não foi possível buscar os dados');
        });
    }
}