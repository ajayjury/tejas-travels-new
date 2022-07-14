<script src="{{ asset('admin/js/pages/choices.min.js') }}"></script>
<script type="text/javascript">

const choicesSubCity = new Choices('#subcity', {
      silent: false,
      items: [],
      choices: [],
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
      placeholderValue: 'Select sub-cities',
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

    document.getElementById('city').addEventListener(
    'change',
    async function(event) {
      // do something creative here...
      
      try {
        let query = "";
        if(event.target?.length>0){
            for (let index = 0; index < event.target.length; index++) {
                if(index==event.target.length-1){
                  query+=event.target[index].value
                }else{
                  query=query+event.target[index].value+";"
                }
            }
        }
          // console.log(event.target.value);
          const response = await axios.get('{{URL::to('/')}}/admin/sub-city/sub-city-major-all-ajax?city='+query)
          // console.log(response)
          let data = []
          if(response.data.subcities.length>0){
            choicesSubCity.clearStore();
            choicesSubCity.clearChoices();
            response.data.subcities.forEach((item)=>{
                data.push({value: item.id, label: item.name,})
            })
            choicesSubCity.setChoices(data);
          }else{
            choicesSubCity.clearStore();
            choicesSubCity.clearChoices();
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