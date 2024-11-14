<div class="table-responsive">
    <table class="table table-bordered">
        <thead class="table-dark">
        <tr>
            <th class="text-center">Observation Notes Form</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td colspan="2">
                <div class="mt-3" wire:ignore>
                    <p><strong>Write your observation:</strong></p>
                    <textarea id="classic-editor2"></textarea>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <button class="btn btn-success" wire:click.prevent="save">test save</button>
            </td>
        </tr>
        </tbody>
    </table>
</div>

@script
    <script>
        document.addEventListener('livewire:initialized', function () {
            ClassicEditor
                .create(document.querySelector('#classic-editor2'))
                .then(editor => {
                    editor.model.document.on('change:data', () => {
                        @this.set('comments', editor.getData());
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endscript
