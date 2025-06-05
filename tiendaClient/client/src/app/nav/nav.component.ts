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
 // FormControl para vincular al input del autocompletado
  buscador = new FormControl<Producto>({}); // Puede ser string (cuando escribes) o Producto (cuando seleccionas)

  // Array donde se almacenarán todos los productos cargados desde el servicio
  productos: Producto[] = [];

  // Observable que contendrá los productos filtrados para mostrar en el mat-autocomplete
  productosFiltrados!: Observable<Producto[]>;

  constructor(
    public productosService: ProductosService, // Servicio para obtener los productos
    private router: Router // Servicio de Router para navegar (si lo necesitas)
  ) { }

  ngOnInit(): void {
    // 1. Cargar todos los productos cuando el componente se inicializa
    this.productosService.getProductos().subscribe({
      next: (respond: any) => { // Tipado fuerte para la respuesta
        this.productos = respond;
      },
      error: (err) => {
        console.error('Error al cargar los productos:', err);
        // Aquí podrías mostrar un mensaje al usuario o hacer algo para manejar el error
      }
    });

    // 2. Configurar el Observable para el filtrado de productos
    this.productosFiltrados = this.buscador.valueChanges.pipe(
      startWith(''), // Para mostrar todos los productos al inicio si el input está vacío
      map(value => {
        // Si 'value' es un objeto (cuando se selecciona un producto), toma su nombre
        // Si 'value' es un string (cuando se escribe), usa el string directamente
        const name = typeof value === 'string' ? value : value?.nombre || '';
        return this._filter(name || ''); // Llama a la función de filtro con el nombre
      })
    );
  }

  /**
   * Función que define cómo se muestra el valor de un Producto seleccionado en el input.
   * @param producto El objeto Producto seleccionado.
   * @returns El nombre del producto o una cadena vacía si no hay producto.
   */
  mostrarNombre(producto: Producto | null): string {
    return producto && producto.nombre ? producto.nombre : '';
  }

  /**
   * Lógica para navegar al carrito (ejemplo).
   */
  entrarCarrito(): void {
    this.router.navigateByUrl('/carrito');
  }

  /**
   * Función privada para filtrar la lista de productos basada en el valor de entrada.
   * @param value El texto que se está buscando en el input.
   * @returns Un array de productos que coinciden con el valor de búsqueda.
   */
  private _filter(value: string): Producto[] {
    const filterValue = value.toLowerCase(); // Convertir a minúsculas para una búsqueda insensible a mayúsculas/minúsculas

    return this.productos.filter(producto =>
      producto.nombre!.toLowerCase().includes(filterValue)
    );
  }


}

