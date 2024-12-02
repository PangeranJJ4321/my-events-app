<span class="px-2 py-1 rounded text-white"
      style="background-color: {{ $getState() === 'attendent' ? 'green' : 'blue' }};">
    {{ ucfirst($getState()) }}
</span>
