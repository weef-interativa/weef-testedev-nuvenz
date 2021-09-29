import { library, dom } from '@fortawesome/fontawesome-svg-core';

// import { faCaretDown } from '@fortawesome/free-solid-svg-icons/faCaretDown';
// import { faUpload } from '@fortawesome/free-solid-svg-icons/faUpload';
// import { faTimes } from '@fortawesome/free-solid-svg-icons/faTimes';
// library.add(faCaretDown, faTimes, faUpload );

import { fas } from '@fortawesome/free-solid-svg-icons';
import { far } from '@fortawesome/free-regular-svg-icons';
import { fab } from '@fortawesome/free-brands-svg-icons';
library.add(fas, far, fab);

// Kicks off the process of finding <i> tags and replacing with <svg>
dom.watch();