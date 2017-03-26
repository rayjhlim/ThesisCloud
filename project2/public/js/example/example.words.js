// word frequencies of first two chapters of Oliver Twist
var words = [
  {text: 'have', size: 102},
  {text: 'Oliver', size: 47},
  {text: 'say', size: 46},
  {text: 'said', size: 36},
  {text: 'bumble', size: 29, href: 'https://en.wikipedia.org/wiki/Beadle'},
  {text: 'will', size: 29},
  {text: 'Mrs', size: 56, href: 'https://en.wikipedia.org/wiki/Mrs.'},
  {text: 'Mann', size: 27, href: 'http://educationcing.blogspot.nl/2012/06/oliver-twist-mrs-manns-character.html'},
  {text: 'Mr', size: 27},
  {text: 'very', size: 26},
  {text: 'child', size: 20},
  {text: 'all', size: 19},
  {text: 'boy', size: 19},
  {text: 'gentleman', size: 19, href: 'http://www.thefreelibrary.com/The+gentleman+in+the+white+waistcoat%3a+Dickens+and+metonymy.-a0154239625'},
  {text: 'great', size: 19},
  {text: 'take', size: 19},
  {text: 'but', size: 18},
  {text: 'beadle', size: 16},
  {text: 'twist', size: 16},
  {text: 'board', size: 15},
  {text: 'more', size: 15},
  {text: 'one', size: 15},
  {text: 'workhouse', size: 15},
  {text: 'parish', size: 14},
  {text: 'there', size: 14},
  {text: 'come', size: 13},
  {text: 'hand', size: 13},
  {text: 'know', size: 13},
  {text: 'sir', size: 13},
  {text: 'being', size: 12},
  {text: 'head', size: 12},
  {text: 'make', size: 12},
  {text: 'out', size: 12},
  {text: 'can', size: 11},
  {text: 'little', size: 11},
  {text: 'reply', size: 11},
  {text: 'any', size: 10},
  {text: 'cry', size: 10},
  {text: 'good', size: 10},
  {text: 'name', size: 10},
  {text: 'poor', size: 10},
  {text: 'time', size: 10},
  {text: 'two', size: 10},
  {text: 'after', size: 9},
  {text: 'dear', size: 9},
  {text: 'get', size: 9},
  {text: 'gruel', size: 9},
  {text: 'long', size: 9},
  {text: 'may', size: 9},
  {text: 'never', size: 9},
  {text: 'some', size: 9},
  {text: 'well', size: 9},
  {text: 'white', size: 9},
  {text: 'woman', size: 9},
  {text: 'chair', size: 8},
  {text: 'day', size: 8},
  {text: 'give', size: 8},
  {text: 'inquire', size: 8},
  {text: 'made', size: 8},
  {text: 'next', size: 8},
  {text: 'now', size: 8},
  {text: 'other', size: 8},
  {text: 'over', size: 8},
  {text: 'small', size: 8},
  {text: 'surgeon', size: 8},
  {text: 'think', size: 8},
  {text: 'too', size: 8},
  {text: 'walk', size: 8},
  {text: 'want', size: 8},
  {text: 'bless', size: 7},
  {text: 'eye', size: 7},
  {text: 'man', size: 7},
  {text: 'master', size: 7},
  {text: 'most', size: 7},
  {text: 'old', size: 7},
  {text: 'people', size: 7},
  {text: 'see', size: 7},
  {text: 'another', size: 6},
  {text: 'at all', size: 6},
  {text: 'authorities', size: 6},
  {text: 'authority', size: 6},
  {text: 'away', size: 6},
  {text: 'face', size: 6},
  {text: 'gate', size: 6},
  {text: 'half', size: 6},
  {text: 'hands', size: 6},
  {text: 'heart', size: 6},
  {text: 'last', size: 6},
  {text: 'might', size: 6},
  {text: 'nurse', size: 6},
  {text: 'once', size: 6},
  {text: 'place', size: 6},
  {text: 'room', size: 6},
  {text: 'table', size: 6},
  {text: 'three', size: 6},
  {text: 'voice', size: 6},
  {text: 'waistcoat', size: 6},
  {text: 'wash', size: 6},
  {text: 'water', size: 6},
  {text: 'a little', size: 5},
  {text: 'bow', size: 5},
  {text: 'business', size: 5},
  {text: 'drop', size: 5},
  {text: 'eyes', size: 5},
  {text: 'fall', size: 5},
  {text: 'find', size: 5},
  {text: 'gin', size: 5},
  {text: 'high', size: 5},
  {text: 'house', size: 5},
  {text: 'infant', size: 5},
  {text: 'night', size: 5},
  {text: 'nobody', size: 5},
  {text: 'orphan', size: 5},
  {text: 'pauper', size: 5},
  {text: 'perhaps', size: 5},
  {text: 'rather', size: 5},
  {text: 'round', size: 5},
  {text: 'sit', size: 5},
  {text: 'world', size: 5},
  {text: 'young', size: 5},
  {text: 'add', size: 4},
  {text: 'ask', size: 4},
  {text: 'at once', size: 4},
  {text: 'behind', size: 4},
  {text: 'bottle', size: 4},
  {text: 'bread', size: 4},
  {text: 'care', size: 4},
  {text: 'copper', size: 4},
  {text: 'die', size: 4},
  {text: 'farm', size: 4},
  {text: 'fat', size: 4},
  {text: 'father', size: 4},
  {text: 'fell', size: 4},
  {text: 'female', size: 4},
  {text: 'going', size: 4},
  {text: 'happen', size: 4},
  {text: 'hat', size: 4},
  {text: 'here', size: 4},
  {text: 'however', size: 4},
  {text: 'hungry', size: 4},
  {text: 'in this', size: 4},
  {text: 'keep', size: 4},
  {text: 'large', size: 4},
  {text: 'low', size: 4},
  {text: 'matter', size: 4},
  {text: 'out of', size: 4},
  {text: 'pound', size: 4},
  {text: 'public', size: 4},
  {text: 'quarter', size: 4},
  {text: 'quite', size: 4},
  {text: 'raise', size: 4},
  {text: 'sleep', size: 4},
];
