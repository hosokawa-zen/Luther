
/**
 * Auto generated file, please don't edit.
 *
 * With: gobl v1.4.1
 * Time: 1616709280
 */

import { getEntityCache, GoblEntityData } from "gobl-utils-ts";
import DYDeviceBase from "./base/DYDeviceBase";

export default class DYDevice extends DYDeviceBase {
	constructor(data?: GoblEntityData) {
		super(data, "DYDevice", DYDevice.PREFIX, DYDevice.COLUMNS);
	}

	public static fromCache(cacheKey: string): DYDevice | undefined {
		const cache: any = getEntityCache("DYDevice");
		return cache && cache[cacheKey];
	}
}
