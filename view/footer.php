</div>

<footer class="bg-dark text-white text-center py-1 ">
    <p><?= date('Y') ?> | Riobamba - Ecuador</p>
    <small>Desarrollador por: Darwin B - Diego C - Andrés G - Johan G - Alexis C - Dayana B</small>
</footer>

<script src="./public/js/bootstrap.bundle.min.js"></script>
<script src="./public/js/jquery-3.6.3.min.js"></script>

<script src="./public/js/sweetalert2@11.js"></script>
<script src="./public/js/validar_cedula.js"></script>

<script>
    //toast para notificaciones
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
</script>
<!-- <script>
    Toast.fire({
        icon: 'success',
        title: 'Signed in successfully'
    })
</script> -->
</body>

</html>