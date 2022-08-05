@if ($errors->any())
<script defer>
        Swal.fire({

            title: `Des Erreurs ont etes detecte`,
            icon: "error",
            backdrop: `
            rgba(120,0,12,0.7)
            no-repeat
        `,
            html:`
                @foreach($errors->all() as $error)
                    <div class='text-danger text-left p-2 font-italic'>{{$error}}</div>
                @endforeach
            `,
            showConfirmButton:false,
            showCancelButton: true,
            cancelButtonText: "Fermer",
            denyButtonColor: "#c11"
        })
    </script>
@endif
