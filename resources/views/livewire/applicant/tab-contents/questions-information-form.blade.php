<div>
    <form wire:submit.prevent="save">

        <!-- Question 34 -->
        <div class="mb-4 border rounded p-3">
            <label class="form-label m-3">34) Are you related by consanguinity or affinity to the appointing or
                recommending chief of bureau or office or to the person who has immediate supervision over you in the
                Bureau or Department where you will be appointed:</label>
            <div class="ms-3">
                <label class="form-label m-3"><i>a. within the third degree?</i></label>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="q34a" wire:model="q34a" id="q34aYes" value="Yes">
                    <label class="form-check-label" for="q34aYes">Yes</label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input ms-3" type="radio" name="q34a" wire:model="q34a" id="q34aNo"
                           value="No">
                    <label class="form-check-label" for="q34aNo">No</label>
                </div>
                @error('q34a') <span class="text-danger">{{ $message }}</span> @enderror

                <!-- Conditionally reveal the input field if 'Yes' is selected -->
                <input type="text"
                       class="form-control mt-2"
                       placeholder="If YES, give details:"
                       wire:model="q34aDetails"
                       x-show="$wire.q34a === 'Yes'"
                       x-transition
                       x-cloak>
                @error('q34aDetails') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="ms-3 mt-3">
                <label class="form-label m-3"><i>b. within the fourth degree (for Local Government Unit - Career
                        Employees)?</i></label>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" wire:model="q34b" id="q34bYes" value="Yes">
                    <label class="form-check-label" for="q34bYes">Yes</label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input ms-3" type="radio" wire:model="q34b" id="q34bNo" value="No">
                    <label class="form-check-label" for="q34bNo">No</label>
                </div>
                @error('q34b') <span class="text-danger">{{ $message }}</span> @enderror

                <input type="text"
                       class="form-control mt-2"
                       placeholder="If YES, give details:"
                       wire:model="q34bDetails"
                       x-show="$wire.q34b === 'Yes'"
                       x-transition
                       x-cloak>
                @error('q34bDetails') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Question 35 -->
        <div class="mb-4 border rounded p-3">
            <label class="form-label m-3">35) a. Have you ever been found guilty of any administrative offense?</label>
            <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="q35a" wire:model="q35a" id="q35aYes" value="Yes">
                <label class="form-check-label" for="q35aYes">Yes</label>
            </div>
            <div class="form-check-inline">
                <input class="form-check-input ms-3" type="radio" name="q35a" wire:model="q35a" id="q35aNo" value="No">
                <label class="form-check-label" for="q35aNo">No</label>
            </div>
            @error('q35a') <span class="text-danger">{{ $message }}</span> @enderror
            <input type="text"
                   class="form-control mt-2"
                   placeholder="If YES, give details:"
                   wire:model="q35aDetails"
                   x-show="$wire.q35a === 'Yes'"
                   x-transition
                   x-cloak>
            @error('q35aDetails') <span class="text-danger">{{ $message }}</span> @enderror

            <div class="mt-3">
                <label class="form-label m-3">b. Have you been criminally charged before any court?</label>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="q35b" wire:model="q35b" id="q35bYes" value="Yes">
                    <label class="form-check-label" for="q35bYes">Yes</label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input ms-3" type="radio" name="q35b" wire:model="q35b" id="q35bNo"
                           value="No">
                    <label class="form-check-label" for="q35bNo">No</label>
                </div>
                @error('q35b') <span class="text-danger">{{ $message }}</span> @enderror
                <input type="text"
                       class="form-control mt-2"
                       placeholder="If YES, give details:"
                       wire:model="q35bDetails"
                       x-show="$wire.q35b === 'Yes'"
                       x-transition
                       x-cloak>
                @error('q35bDetails') <span class="text-danger">{{ $message }}</span> @enderror

                <input type="date"
                       class="form-control mt-2"
                       placeholder="Date Filed:"
                       wire:model="q35bDateFiled"
                       x-show="$wire.q35b === 'Yes'"
                       x-transition
                       x-cloak>
                @error('q35bDateFiled') <span class="text-danger">{{ $message }}</span> @enderror

                <input type="text"
                       class="form-control mt-2"
                       placeholder="Status of Case/s:"
                       wire:model="q35bStatus"
                       x-show="$wire.q35b === 'Yes'"
                       x-transition
                       x-cloak>
                @error('q35bStatus') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>


        <!-- Question 36 -->
        <div class="mb-4 border rounded p-3">
            <label class="form-label m-3">36) Have you ever been convicted of any crime or violation of any law, decree,
                ordinance or regulation by any court or tribunal?</label>
            <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="q36" wire:model="q36" id="q36Yes" value="Yes">
                <label class="form-check-label" for="q36Yes">Yes</label>
            </div>
            <div class="form-check-inline">
                <input class="form-check-input ms-3" type="radio" name="q36" wire:model="q36" id="q36No" value="No">
                <label class="form-check-label" for="q36No">No</label>
            </div>
            @error('q36') <span class="text-danger">{{ $message }}</span> @enderror
            <input type="text"
                   class="form-control mt-2"
                   placeholder="If YES, give details:"
                   wire:model="q36Details"
                   x-show="$wire.q36 === 'Yes'"
                   x-transition
                   x-cloak>
            @error('q36Details') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Question 37 -->
        <div class="mb-4 border rounded p-3">
            <label class="form-label m-3">37) Have you ever left a job in the public or private sector, whether through
                resignation, retirement, dismissal, contract completion, or any other reason?</label>
            <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="q37" wire:model="q37" id="q37Yes" value="Yes">
                <label class="form-check-label" for="q37Yes">Yes</label>
            </div>
            <div class="form-check-inline">
                <input class="form-check-input ms-3" type="radio" name="q37" wire:model="q37" id="q37No" value="No">
                <label class="form-check-label" for="q37No">No</label>
            </div>
            @error('q37') <span class="text-danger">{{ $message }}</span> @enderror
            <input type="text"
                   class="form-control mt-2"
                   placeholder="If YES, give details:"
                   wire:model="q37Details"
                   x-show="$wire.q37 === 'Yes'"
                   x-transition
                   x-cloak>
            @error('q37Details') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Question 38 -->
        <div class="mb-4 border rounded p-3">
            <label class="form-label m-3">38) a. Have you ever been a candidate in a national or local election held
                within the last year (except Barangay election)?</label>
            <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="q38a" wire:model="q38a" id="q38aYes" value="Yes">
                <label class="form-check-label" for="q38aYes">Yes</label>
            </div>
            <div class="form-check-inline">
                <input class="form-check-input ms-3" type="radio" name="q38a" wire:model="q38a" id="q38aNo" value="No">
                <label class="form-check-label" for="q38aNo">No</label>
            </div>
            @error('q38a') <span class="text-danger">{{ $message }}</span> @enderror
            <input type="text"
                   class="form-control mt-2"
                   placeholder="If YES, give details:"
                   wire:model="q38aDetails"
                   x-show="$wire.q38a === 'Yes'"
                   x-transition
                   x-cloak>
            @error('q38aDetails') <span class="text-danger">{{ $message }}</span> @enderror

            <div class="mt-3">
                <label class="form-label m-3">b. Have you resigned from the government service during the three
                    (3)-month period before the last election to promote/actively campaign for a national or local
                    candidate?</label>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="q38b" wire:model="q38b" id="q38bYes" value="Yes">
                    <label class="form-check-label" for="q38bYes">Yes</label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input ms-3" type="radio" name="q38b" wire:model="q38b" id="q38bNo"
                           value="No">
                    <label class="form-check-label" for="q38bNo">No</label>
                </div>
                @error('q38b') <span class="text-danger">{{ $message }}</span> @enderror
                <input type="text"
                       class="form-control mt-2"
                       placeholder="If YES, give details:"
                       wire:model="q38bDetails"
                       x-show="$wire.q38b === 'Yes'"
                       x-transition
                       x-cloak>
                @error('q38bDetails') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Question 39 -->
        <div class="mb-4 border rounded p-3">
            <label class="form-label m-3">39) Have you acquired the status of an immigrant or permanent resident of
                another country?</label>
            <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="q39" wire:model="q39" id="q39Yes" value="Yes">
                <label class="form-check-label" for="q39Yes">Yes</label>
            </div>
            <div class="form-check-inline">
                <input class="form-check-input ms-3" type="radio" name="q39" wire:model="q39" id="q39No" value="No">
                <label class="form-check-label" for="q39No">No</label>
            </div>
            @error('q39') <span class="text-danger">{{ $message }}</span> @enderror
            <input type="text"
                   class="form-control mt-2"
                   placeholder="If YES, give details (country):"
                   wire:model="q39Details"
                   x-show="$wire.q39 === 'Yes'"
                   x-transition
                   x-cloak>
            @error('q39Details') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Question 40 -->
        <div class="mb-4 border rounded p-3">
            <label class="form-label m-3">40) Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for
                Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972):</label>
            <div class="ms-3">
                <label class="form-label m-3">a. Are you a member of any indigenous group?</label>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="q40a" wire:model="q40a" id="q40aYes" value="Yes">
                    <label class="form-check-label" for="q40aYes"> Yes</label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input ms-3" type="radio" name="q40a" wire:model="q40a" id="q40aNo"
                           value="No">
                    <label class="form-check-label" for="q40aNo">No</label>
                </div>
                @error('q40a') <span class="text-danger">{{ $message }}</span> @enderror
                <input type="text"
                       class="form-control mt-2"
                       placeholder="If YES, please specify:"
                       wire:model="q40aDetails"
                       x-show="$wire.q40a === 'Yes'"
                       x-transition
                       x-cloak>
                @error('q40aDetails') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="ms-3 mt-3">
                <label class="form-label m-3">b. Are you a person with disability?</label>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="q40b" wire:model="q40b" id="q40bYes" value="Yes">
                    <label class="form-check-label" for="q40bYes">Yes</label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input ms-3" type="radio" name="q40b" wire:model="q40b" id="q40bNo"
                           value="No">
                    <label class="form-check-label" for="q40bNo">No</label>
                </div>
                @error('q40b') <span class="text-danger">{{ $message }}</span> @enderror
                <input type="text"
                       class="form-control mt-2"
                       placeholder="If YES, please specify ID No:"
                       wire:model="q40bDetails"
                       x-show="$wire.q40b === 'Yes'"
                       x-transition
                       x-cloak>
                @error('q40bDetails') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="ms-3 mt-3">
                <label class="form-label m-3">c. Are you a solo parent?</label>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="q40c" wire:model="q40c" id="q40cYes" value="Yes">
                    <label class="form-check-label" for="q40cYes">Yes</label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input ms-3" type="radio" name="q40c" wire:model="q40c" id="q40cNo"
                           value="No">
                    <label class="form-check-label" for="q40cNo">No</label>
                </div>
                @error('q40c') <span class="text-danger">{{ $message }}</span> @enderror
                <input type="text"
                       class="form-control mt-2"
                       placeholder="If YES, please specify ID No:"
                       wire:model="q40cDetails"
                       x-show="$wire.q40c === 'Yes'"
                       x-transition
                       x-cloak>
                @error('q40cDetails') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>


        <div class="d-grid">
            <button type="submit" class="btn btn-secondary">Save Questionnaire</button>
        </div>
    </form>
</div>
