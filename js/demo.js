var events = [
  {'Date': new Date(2016, 6, 7), 'Title': 'Doctor appointment at 3:25pm.'},

  {'Date': new Date(2019, 6, 21), 'Title': 'End of university', 'Link': 'https://upv.es'},
];
var settings = {};
var element = document.getElementById('caleandar');
caleandar(element, events, settings);
