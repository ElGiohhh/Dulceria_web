
<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-600 dark:text-gray-400 leading-tight">
          {{ __('Inventario') }}
      </h2>
  </x-slot>
  
  <div class="table-responsive">
    <table class="table table-primary">
      <thead>
        <tr>
          <th scope="col">Column 1</th>
          <th scope="col">Column 2</th>
          <th scope="col">Column 3</th>
        </tr>
      </thead>
      <tbody>
        <tr class="">
          <td scope="row">R1C1</td>
          <td>R1C2</td>
          <td>R1C3</td>
        </tr>
        <tr class="">
          <td scope="row">Item</td>
          <td>Item</td>
          <td>Item</td>
        </tr>
      </tbody>
    </table>
  </div>
  
 
    

</x-app-layout>
