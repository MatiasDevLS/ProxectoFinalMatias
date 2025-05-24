import { Component } from '@angular/core';
import { ProductosService } from '../services/ProductoService/productos.service';
import { CartaProductoComponent } from '../carta-producto/carta-producto.component';

@Component({
  selector: 'app-categoria-productos',
  imports: [CartaProductoComponent],
  templateUrl: './categoria-productos.component.html',
  styleUrl: './categoria-productos.component.scss'
})
export class CategoriaProductosComponent {
  productos: any;

  constructor(public productosService: ProductosService) { }

  ngOnInit(): void {
    this.productosService.getProductos().subscribe({
      next: (respond: any) => this.productos = respond
    });
  }
}
