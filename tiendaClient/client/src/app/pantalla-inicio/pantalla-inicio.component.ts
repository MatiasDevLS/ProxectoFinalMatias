import { Component } from '@angular/core';
import { ProductosService } from '../services/ProductoService/productos.service';
import { CartaProductoComponent } from '../carta-producto/carta-producto.component';

@Component({
  selector: 'app-pantalla-inicio',
  imports: [CartaProductoComponent],
  templateUrl: './pantalla-inicio.component.html',
  styleUrl: './pantalla-inicio.component.scss'
})
export class PantallaInicioComponent {
  productos: any;

  constructor(public productosService: ProductosService) { }

  // Se obtienen todos los productos
  ngOnInit(): void {
    this.productosService.getProductos().subscribe({
      next: (respond: any) => this.productos = respond
    });
  }
}
