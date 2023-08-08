<!-- Modal -->
<div class="modal fade" id="newDocumentation" tabindex="-1" role="dialog" aria-labelledby="newDocumentation" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Documentation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('documentation.store') }}" id="documentation-upload-form" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <input type="file" name="img" id="img" data-max-file-size="2M" data-show-errors="true" data-max-file-size-preview="2M">
            <input type="text" name="caption" id="caption" class="form-control mt-2" placeholder="Write caption here">
          <div class="modal-footer">  
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
            <input type="submit" value="Save" id="submit_doc" class="btn btn-primary btn-sm">
          </div>
        </form>
      </div>
    </div>
  </div>
