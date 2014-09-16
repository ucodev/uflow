/**
 * @file bitops.h
 * @brief uSched
 *        Bit Operations interface header
 *
 * Date: 16-09-2014
 * 
 * Copyright 2014 Pedro A. Hortas (pah@ucodev.org)
 *
 * This file is part of uflow.
 *
 * uflow is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * uflow is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with uflow.  If not, see <http://www.gnu.org/licenses/>.
 *
 */


#ifndef UFLOW_BITOPS_H
#define UFLOW_BITOPS_H

#include <stdint.h>

/* Prototypes */
void bit_set(uint32_t *dword, unsigned int n);
void bit_clear(uint32_t *dword, unsigned int n);
void bit_toggle(uint32_t *dword, unsigned int n);
unsigned int bit_test(const uint32_t *dword, unsigned int n);

#endif

