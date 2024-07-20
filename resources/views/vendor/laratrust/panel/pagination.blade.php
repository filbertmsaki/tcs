<div class="d-flex justify-content-between align-items-center py-3 border-top">
    <div class="d-flex flex-grow-1 justify-content-end">
      <nav>
        <ul class="pagination mb-0">
          @if ($paginator->onFirstPage())
            <li class="page-item disabled">
              <span class="page-link" aria-disabled="true">
                <svg class="bi bi-chevron-left" fill="currentColor" viewBox="0 0 16 16" width="1em" height="1em">
                  <path fill-rule="evenodd" d="M11.354 1.354a.5.5 0 00-.708-.708l-6 6a.5.5 0 000 .708l6 6a.5.5 0 00.708-.708L5.707 8l5.647-5.646z" clip-rule="evenodd"/>
                </svg>
                Previous
              </span>
            </li>
          @else
            <li class="page-item">
              <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous">
                <svg class="bi bi-chevron-left" fill="currentColor" viewBox="0 0 16 16" width="1em" height="1em">
                  <path fill-rule="evenodd" d="M11.354 1.354a.5.5 0 00-.708-.708l-6 6a.5.5 0 000 .708l6 6a.5.5 0 00.708-.708L5.707 8l5.647-5.646z" clip-rule="evenodd"/>
                </svg>
                Previous
              </a>
            </li>
          @endif

          @if ($paginator->hasMorePages())
            <li class="page-item">
              <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next">
                Next
                <svg class="bi bi-chevron-right" fill="currentColor" viewBox="0 0 16 16" width="1em" height="1em">
                  <path fill-rule="evenodd" d="M4.646 1.354a.5.5 0 011 0L11.293 8 5.646 13.646a.5.5 0 01-.708-.708L9.586 8 4.938 3.354a.5.5 0 01-.292-.5z" clip-rule="evenodd"/>
                </svg>
              </a>
            </li>
          @else
            <li class="page-item disabled">
              <span class="page-link" aria-disabled="true">
                Next
                <svg class="bi bi-chevron-right" fill="currentColor" viewBox="0 0 16 16" width="1em" height="1em">
                  <path fill-rule="evenodd" d="M4.646 1.354a.5.5 0 011 0L11.293 8 5.646 13.646a.5.5 0 01-.708-.708L9.586 8 4.938 3.354a.5.5 0 01-.292-.5z" clip-rule="evenodd"/>
                </svg>
              </span>
            </li>
          @endif
        </ul>
      </nav>
    </div>
  </div>
