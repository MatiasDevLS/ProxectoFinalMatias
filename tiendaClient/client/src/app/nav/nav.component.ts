import { Component } from '@angular/core';
import { MatAutocompleteModule } from '@angular/material/autocomplete';
import { FormControl, ReactiveFormsModule } from '@angular/forms';
import { ProductosService } from '../services/ProductoService/productos.service';
import { ActivatedRoute, Router, RouterModule, RouterOutlet } from '@angular/router';
import { Producto } from '../Models/Producto';
import { map, Observable, startWith } from 'rxjs';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-nav',
  imports: [MatAutocompleteModule, ReactiveFormsModule, CommonModule, RouterModule  ],
  templateUrl: './nav.component.html',
  styleUrl: './nav.component.scss'
})
export class NavComponent {
  buscador = new FormControl<Producto>({}); 

  
  productos: Producto[] = [];

 
  productosFiltrados!: Observable<Producto[]>;

  constructor(
    public productosService: ProductosService, 
    private router: Router 
  ) { }

  // Obtiene todos los productos para el buscador
  ngOnInit(): void {
   
    this.productosService.getProductos().subscribe({
      next: (respond: any) => { 
        this.productos = respond;
      },
      error: (err) => {
        console.error('Error al cargar los productos:', err);
      
      }
    });


    this.productosFiltrados = this.buscador.valueChanges.pipe(
      startWith(''), // Para mostrar todos los productos al inicio si el input está vacío
      map(value => {

        const name = typeof value === 'string' ? value : value?.nombre || '';
        return this._filter(name || ''); // Llama a la función de filtro con el nombre
      })
    );
  }


  mostrarNombre(producto: Producto | null): string {
    return producto && producto.nombre ? producto.nombre : '';
  }

 
  entrarCarrito(): void {
    this.router.navigateByUrl('/carrito');
  }

  // Filtra los valores a partir del valor introducido
  private _filter(value: string): Producto[] {
    const filterValue = value.toLowerCase(); // Convertir a minúsculas para una búsqueda insensible a mayúsculas/minúsculas

    return this.productos.filter(producto =>
      producto.nombre!.toLowerCase().includes(filterValue)
    );
  }


}

