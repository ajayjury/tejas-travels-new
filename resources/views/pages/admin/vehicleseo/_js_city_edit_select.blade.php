<script src="{{ asset('admin/js/pages/choices.min.js') }}"></script>
<script type="text/javascript">

const choicesCity = new Choices('#city', {
      silent: false,
      items: [],
      choices: [
        {
            value: 'Select a city',
            label: 'Select a city',
            disabled: true,
        },
        @foreach($cities as $cities)
          {
              value: '{{$cities->id}}',
              label: '{{$cities->name}}',
              selected: {{($country->city->id==$cities->id) ? 'true' : 'false'}},
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
      placeholderValue: 'Select cities',
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

    document.getElementById('state').addEventListener(
    'change',
    async function(event) {
      // do something creative here...
      
      try {
          // console.log(event.target.value);
          const response = await axios.get('{{URL::to('/')}}/admin/management/panel/city/city-all-ajax/'+event.target.value)
          // console.log(response)
          let data = []
          if(response.data.cities.length>0){
            choicesCity.clearStore();
            choicesCity.clearChoices();
            response.data.cities.forEach((item)=>{
                data.push({value: item.id, label: item.name,})
            })
            choicesCity.setChoices(data);
          }else{
            choicesCity.clearStore();
            choicesCity.clearChoices();
          }
      } catch (error) {
          console.log(error);
          iziToast.error({
              title: 'Error',
              message: 'Something went wrong. Please refresh the page',
              position: 'topRight',
              timeout:6000
          });
      }
    }
  );

    
  </script>