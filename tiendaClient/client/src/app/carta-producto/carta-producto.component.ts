import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-carta-producto',
  imports: [],
  templateUrl: './carta-producto.component.html',
  styleUrl: './carta-producto.component.scss'
})
export class CartaProductoComponent {
  @Input() imagenUrl!:string
  @Input() nombre!:string
  @Input() id!:string
} 
