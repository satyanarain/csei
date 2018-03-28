  <td>
              @if($request->status == '0')
                <span class="badge badge-primary">Requested</span>
              @elseif($request->status == '1')
                <span class="badge badge-secondary">Verified</span>
              @elseif($request->status == '2')
                <span class="badge badge-info">Approved</span>
              @elseif($request->status == '3')
                <span class="badge badge-warning">Reconciliation</span>
              @elseif($request->status == '4')
                <span class="badge badge-success">Closed</span>
              @else
                <span class="badge badge-danger">Rejected</span>
              @endif
              </td>