<div id="myModalState" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">States</h5>
                <button type="button" id="myModalCloseState" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <div class="live-preview">
                    <form id="stateModalForm" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="refreshUrlState" value="{{URL::current()}}" />
                    <div class="row gy-4">
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="nameStateModal">
                                @error('name') 
                                    <div class="invalid-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label for="country" class="form-label">Country</label>
                                <select id="countryStateModal" name="country"></select>
                                @error('country') 
                                    <div class="invalid-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xxl-12 col-md-12">
                            <div>
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="descriptionStateModal"
                                    rows="3"></textarea>
                                    @error('description') 
                                        <div class="invalid-message">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-12 col-md-12">
                            <div class="mt-4 mt-md-0">
                                <div>
                                    <div class="form-check form-switch form-check-right mb-2">
                                        <input class="form-check-input" type="checkbox" role="switch" id="modalSwitchState" name="status" checked>
                                        <label class="form-check-label" for="modalSwitchState">Status</label>
                                    </div>
                                </div>
                                
                            </div>
                        </div><!--end col-->

                        <div class="col-xxl-12 col-md-12">
                            <button type="submit" class="btn btn-primary waves-effect waves-light" id="modalStateSubmitBtn">
                                Submit
                            </button>
                        </div>
                        
                    </div>
                    </form>
                    <!--end row-->
                </div>

            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="{{ asset('admin/js/pages/just-validate.production.min.js') }}"></script>
<script src="{{ asset('admin/js/pages/axios.min.js') }}"></script>
<script src="{{ asset('admin/js/pages/iziToast.min.js') }}"></script>
<script src="{{ asset('admin/js/pages/choices.min.js') }}"></script>
<script type="text/javascript">


const choicesModal = new Choices('#countryStateModal', {
    silent: false,
    items: [],
    choices: [
            {
                value: 'Select a country',
                label: 'Select a country',
                selected: {{empty(old('country')) ? 'true' : 'false'}},
                disabled: true,
            },
        @foreach($countries as $countries)
            {
                value: '{{$countries->id}}',
                label: '{{$countries->name}}',
                selected: {{(old('country')==$countries->id) ? 'true' : 'false'}},
            },
        @endforeach
    ],
    renderChoiceLimit: -1,
    maxItemCount: -1,
    addItems: true,
    addItemFilter: null,
    removeItems: true,
    removeItemButton: false,
    editItems: false,
    allowHTML: true,
    duplicateItemsAllowed: true,
    delimiter: ',',
    paste: true,
    searchEnabled: true,
    searchChoices: true,
    searchFloor: 1,
    searchResultLimit: 4,
    searchFields: ['label', 'value'],
    position: 'auto',
    resetScrollPosition: true,
    shouldSort: true,
    shouldSortItems: false,
    // sorter: () => {...},
    placeholder: true,
    placeholderValue: 'Select a country',
    searchPlaceholderValue: null,
    prependValue: null,
    appendValue: null,
    renderSelectedChoices: 'auto',
    loadingText: 'Loading...',
    noResultsText: 'No results found',
    noChoicesText: 'No choices to choose from',
    itemSelectText: 'Press to select',
    addItemText: (value) => {
      return `Press Enter to add <b>"${value}"</b>`;
    },
    maxItemText: (maxItemCount) => {
      return `Only ${maxItemCount} values can be added`;
    },
    valueComparer: (value1, value2) => {
      return value1 === value2;
    },
    classNames: {
      containerOuter: 'choices',
      containerInner: 'choices__inner',
      input: 'choices__input',
      inputCloned: 'choices__input--cloned',
      list: 'choices__list',
      listItems: 'choices__list--multiple',
      listSingle: 'choices__list--single',
      listDropdown: 'choices__list--dropdown',
      item: 'choices__item',
      itemSelectable: 'choices__item--selectable',
      itemDisabled: 'choices__item--disabled',
      itemChoice: 'choices__item--choice',
      placeholder: 'choices__placeholder',
      group: 'choices__group',
      groupHeading: 'choices__heading',
      button: 'choices__button',
      activeState: 'is-active',
      focusState: 'is-focused',
      openState: 'is-open',
      disabledState: 'is-disabled',
      highlightedState: 'is-highlighted',
      selectedState: 'is-selected',
      flippedState: 'is-flipped',
      loadingState: 'is-loading',
      noResults: 'has-no-results',
      noChoices: 'has-no-choices'
    },
    // Choices uses the great Fuse library for searching. You
    // can find more options here: https://fusejs.io/api/options.html
    fuseOptions: {
      includeScore: true
    },
    labelId: '',
    callbackOnInit: null,
    callbackOnCreateTemplates: null
  });

  function setStateData(data){
    choices.setChoices([
        {value: data.id, label: data.name}
    ]);
  }

    // initialize the validation library
    const validationModalState = new JustValidate('#stateModalForm', {
          errorFieldCssClass: 'is-invalid',
    });
    // apply rules to form fields
    validationModalState
      .addField('#nameStateModal', [
        {
          rule: 'required',
          errorMessage: 'Name is required',
        },
        {
            rule: 'customRegexp',
            value: /^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i,
            errorMessage: 'Name is invalid',
        },
      ])
      .addField('#countryStateModal', [
            {
            rule: 'required',
            errorMessage: 'Please select a country',
            },
            {
                validator: (value, fields) => {
                if (value === 'Select a country') {
                    return false;
                }

                return true;
                },
                errorMessage: 'Please select a country',
            },
        ])
      .onSuccess(async (event) => {
        event.target.preventDefault;

        const errorToastState = (message) =>{
            iziToast.error({
                title: 'Error',
                message: message,
                position: 'bottomCenter',
                timeout:7000
            });
        }
        const successToastState = (message) =>{
            iziToast.success({
                title: 'Success',
                message: message,
                position: 'bottomCenter',
                timeout:6000
            });
        }

        var submitBtnState = document.getElementById('modalStateSubmitBtn')
        submitBtnState.innerHTML = `
            <span class="d-flex align-items-center">
                <span class="spinner-border flex-shrink-0" role="status">
                    <span class="visually-hidden">Loading...</span>
                </span>
                <span class="flex-grow-1 ms-2">
                    Loading...
                </span>
            </span>
            `
            submitBtnState.disabled = true;
        try {
            var formData = new FormData();
            formData.append('name',document.getElementById('nameStateModal').value)
            formData.append('description',document.getElementById('descriptionStateModal').value)
            formData.append('country',document.getElementById('countryStateModal').value)
            formData.append('status',document.getElementById('modalSwitchState').value)
            formData.append('refreshUrl','{{URL::current()}}')
            const responseState = await axios.post('{{route('state_ajax_store')}}', formData)
            successToastState(responseState.data.message)
            var myModal = document.getElementById('myModalState')
            document.getElementById('myModalCloseState').click()
            setStateData(responseState.data.data)
        } catch (error) {
            if(error?.responseState?.data?.form_error?.name){
                errorToastState(error?.responseState?.data?.form_error?.name[0])
            }
            if(error?.responseState?.data?.form_error?.dial){
                errorToastState(error?.responseState?.data?.form_error?.dial[0])
            }
            if(error?.responseState?.data?.form_error?.image){
                errorToastState(error?.responseState?.data?.form_error?.image[0])
            }
            if(error?.responseState?.data?.form_error?.description){
                errorToastState(error?.responseState?.data?.form_error?.description[0])
            }
            if(error?.responseState?.data?.error){
                errorToastState(error?.responseState?.data?.error)
            }
        } finally{
            submitBtnState.innerHTML =  `
                Submit
                `
                submitBtnState.disabled = false;
        }

        
        
      });
    </script>