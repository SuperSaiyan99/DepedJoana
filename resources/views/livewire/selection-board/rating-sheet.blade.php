<div class="table-responsive">
    <table class="table table-bordered">
        <thead class="table-dark">
        <tr>
            <th class="text-center">INDICATORS</th>
            <th class="text-center">FINAL RATING</th>
        </tr>
        </thead>
        <tbody>
        @foreach($questions as $index => $question)
            <tr wire:key="question-{{ $index }}">
                <td>{{ $index + 1 }}. {{ $question->description }}</td>
                <td class="text-center align-middle">
                    <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                <span class="input-group-btn input-group-prepend">
                    <button wire:click="decrement_points({{ $index }})" class="btn btn-primary bootstrap-touchspin-down" type="button">-</button>
                </span>
                        <input type="text" data-toggle="touchspin" value="{{ $points[$index] }}" class="form-control" readonly>
                        <span class="input-group-btn input-group-append">
                    <button wire:click="increment_points({{ $index }})" class="btn btn-primary bootstrap-touchspin-up" type="button">+</button>
                </span>
                    </div>
                </td>
            </tr>
        @endforeach


        <tr>
            <td><strong>TOTAL NO. OF POINTS OBTAINED (highest possible score is 30)</strong></td>
            <td class="text-center align-middle">
                <strong><h3><span wire:model>{{ $total }}</span>/30</h3></strong>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="mt-3" wire:ignore>
                    <h6><strong>OTHER COMMENTS:</strong></h6>
                    <textarea wire:model.defer="comments" id="classic-editor3"></textarea>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>


@script
<script>
    document.addEventListener('livewire:initialized', function () {
        ClassicEditor
            .create(document.querySelector('#classic-editor3'))
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
