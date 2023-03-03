<div class="modal fade" id="confirm-logout-modal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center mt-3">ログアウトしてもよろしいですか？</p>

                <form action="#" method="POST" id="logout-form">
                    @csrf
                    <div class="form-group text-center">
                        <button type='button' class='btn btn-default rounded-pill col-lg-3' data-dismiss='modal'>閉じる</button>
                        <button type='submit' class='btn btn-info rounded-pill col-lg-3 mb-3 m-lg-0'>はい</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>