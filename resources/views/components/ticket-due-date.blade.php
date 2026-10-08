@if($dueDate)
    <div class="px-2 py-1 rounded flex items-center justify-center text-center text-xs text-white
                {{ $status === 'overdue' ? 'bg-danger-600' : ($status === 'soon' ? 'bg-warning-600' : 'bg-gray-500') }}"
         title="{{ __('Due date') }}">
        {{ $dueDate->format('d/m') }}
    </div>
@endif
