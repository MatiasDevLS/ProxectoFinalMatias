import { Component } from '@angular/core';
import { MatAutocompleteModule } from '@angular/material/autocomplete';
import { FormControl, ReactiveFormsModule } from '@angular/forms';
import { ProductosService } from '../services/ProductoService/productos.service';
import { ActivatedRoute, Router, RouterOutlet } from '@angular/router';

@Component({
  selector: 'app-nav',
  imports: [MatAutocompleteModule, ReactiveFormsModule],
  templateUrl: './nav.component.html',
  styleUrl: './nav.component.scss'
})
export class NavComponent {
  productos: any;

  buscador = new FormControl(); 

  constructor(public productosService: ProductosService, private router: Router) { }

  ngOnInit(): void {
    this.productosService.getProductos().subscribe({
      next: (respond: any) => this.productos = respond
    });
  }

  mostrarNombre(producto: any): string {
    return producto && producto.nombre ? producto.nombre : '';
  }

  entrarCarrito(){
      this.router.navigateByUrl('/carrito')
  }

}