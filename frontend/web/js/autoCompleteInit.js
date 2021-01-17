const autoCompleteJS = new autoComplete({
  data: {                              // Data src [Array, Function, Async] | (REQUIRED)
    src: async () => {
      const query = document.querySelector("#autoComplete").value;
      const source = await fetch(`/ajax/coords/?value=${query}`);
      const data = await source.json();
      return data.coords;
    },
    key: ["name"],
    cache: false
  },
  selector: "#autoComplete",           // Input field selector              | (Optional)
  observer: true,                      // Input field observer | (Optional)
  threshold: 3,                        // Min. Chars length to start Engine | (Optional)
  debounce: 300,                       // Post duration for engine to start | (Optional)
  searchEngine: "strict",              // Search Engine type/mode           | (Optional)
  resultsList: {                       // Rendered results list object      | (Optional)
    container: source => {
      source.setAttribute("id", "name");
    },
    destination: "#autoComplete",
    position: "afterend",
    element: "ul"
  },
  maxResults: 5,                         // Max. number of rendered results | (Optional)
  highlight: true,                       // Highlight matching results      | (Optional)
  resultItem: {                          // Rendered result item            | (Optional)
    content: (data, source) => {
      source.innerHTML = data.match;
    },
    element: "li"
  },
  noResults: (dataFeedback, generateList) => {
    // Generate autoComplete List
    generateList(autoCompleteJS, dataFeedback, dataFeedback.results);
    // No Results List Item
    const result = document.createElement("li");
    result.setAttribute("class", "no_result");
    result.setAttribute("tabindex", "1");
    result.innerHTML = `<span style="display: flex; align-items: center; font-weight: 100; color: rgba(0,0,0,.2);">Found No Results for "${dataFeedback.query}"</span>`;
    document.querySelector(`#${autoCompleteJS.resultsList.idName}`).appendChild(result);
  },
  onSelection: feedback => {             // Action script onSelection event | (Optional)
    document.querySelector("#autoComplete").blur();
    // Prepare User's Selected Value
    const selection = feedback.selection.value;
    // Replace Input value with the selected value
    document.querySelector("#autoComplete").value = selection.name;
    document.querySelector("#js-address-input").value = selection.name;
    document.querySelector("#js-latitude-input").value = selection.latitude;
    document.querySelector("#js-longitude-input").value = selection.longitude;
  }
});
