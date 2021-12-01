

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2021</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Cancel Modal-->
<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Cancel?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= $_SERVER['HTTP_REFERER'] ?>">Ok</a>
            </div>
        </div>
    </div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="/assets/admin/js/jquery.min.js"></script>
<script src="/assets/admin/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/assets/admin/js/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/assets/admin/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="/assets/admin/js/Chart.min.js"></script>

<script>
    let i = 0;

    function addImageInput() {
        let d = 'div_';
        $('#imageInputs').append('<div class="form-group" id="' + d + i + '">' +
                                    '<div class="input-group">' +
                                        '<input type="file" name="images[]" class="form-control" multiple>' +
                                        '<div class="input-group-append">' +
                                            '<button id="" type="button" onclick="removeParent(\'' + d + i + '\')" class="btn btn-danger"><i class="fa fa-minus"></i></button>' +
                                        '</div>' +
                                    '</div>' +
                                  '</div>');
        i++;
    }

    function removeParent(elem) {
        $('#' + elem).remove();
        // elem.closest('div.input-group').remove();
    }
</script>

</body>

</html>